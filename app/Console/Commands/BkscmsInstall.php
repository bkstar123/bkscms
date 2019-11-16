<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Bkstar123\Flashing\FlashingServiceProvider;
use Bkstar123\BksCMS\Utilities\Providers\UtilitiesServiceProvider;
use Bkstar123\BksCMS\AdminPanel\Providers\AdminPanelServiceProvider;

class BkscmsInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bkscms:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install BksCMS content management system';

    /**
     * Hold the name of the user who runs this command
     *
     * @var string
     */
    protected $launcher;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->launcher = trim(shell_exec('whoami'));
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (!$this->isRoot()) {
            return;
        }
        $this->info('Installation is in progress...');
        $this->deploy();
        $this->createFullTextIndex();
        $this->compileAssets();
        $this->publishDependentAssets();
        $this->changeOwnerships();
        $this->info('The installation has been successfully completed');
    }

    /**
     * Run basic deployment including database migration & seedings, create public storage symlink
     *
     * @return void
     */
    protected function deploy()
    {
        $this->call('storage:link');
        $this->call('migrate:refresh');
        $this->call('bkscms:initAuth', [
            '--scope' => 'all'
        ]);
    }

    /**
     * Change ownerships of the application's root directory to webserver's user and group
     *
     * @return void
     */
    protected function changeOwnerships()
    {
        $app_root_dir = base_path();
        if (env('WEB_SERVER_USER')) {
            $web_server_user = env('WEB_SERVER_USER');
        } else {
            $web_server_user = $this->ask("Enter the 'user' under which the web server is running(apache|apache2|daemon|www-data|nginx): ");
        }
        if (env('WEB_SERVER_GROUP')) {
            $web_server_group = env('WEB_SERVER_GROUP');
        } else {
            $web_server_group = $this->ask("Enter the 'group' under which the web server is running(apache|apache2|daemon|www-data|nginx: ");
        }
        shell_exec("chown {$web_server_user}:{$web_server_group} -R {$app_root_dir}");
    }

    /**
     * Compile Assets
     *
     * @return void
     */
    protected function compileAssets()
    {
        $environment = config('app.env');
        shell_exec("npm install");
        $environment === 'production' ?
            shell_exec("npm run prod && npm prune --production") :
            shell_exec("npm run dev");
    }

    /**
     * Publish dependent assets
     *
     * @return void
     */
    protected function publishDependentAssets()
    {
        $this->call('vendor:publish', ['--provider' => FlashingServiceProvider::class]);
        $this->call('vendor:publish', ['--provider' => UtilitiesServiceProvider::class]);
        $this->call('vendor:publish', ['--provider' => AdminPanelServiceProvider::class]);
    }

    /**
     * Create full text index
     *
     * @return void
     */
    protected function createFullTextIndex()
    {
        $this->call('mysql-search:init', [
            "modelClass" => "Bkstar123\BksCMS\AdminPanel\Admin"
        ]);
        $this->call('mysql-search:init', [
            "modelClass" => "Bkstar123\BksCMS\AdminPanel\Role"
        ]);
        $this->call('mysql-search:init', [
            "modelClass" => "Bkstar123\BksCMS\AdminPanel\Permission"
        ]);
    }

    /**
     * Check for the root privilege
     * Make sure only root user can run this command
     *
     * @return boolean
     */
    protected function isRoot()
    {
        if ($this->launcher != 'root') {
            $this->error("This command must only be run by root");
            return false;
        } else {
            return true;
        }
    }
}
