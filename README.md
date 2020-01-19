# bkstar123/bkscms

> This is a Laravel based generic content management system (CMS) which is integrated with AdminLTE for UI part. The features are very basic and it only serves for the purpose of saving you from doing some boilerplate coding.  

For the time of writing, the following features are included:  
- Admin Panel with authentication & authorization (see https://github.com/bkstar123/bkscms-admin-panel for details)  

## 1. Installation

&ndash; Download the latest stable version:  
```composer create-project --prefer-dist bkstar123/bkscms <your-project>```  

&ndash; To download the dev-master branch (unstable):  
```composer create-project --prefer-dist --stability dev bkstar123/bkscms <your-project>```  

Update **.env** file with the necessary key/value settings such as database, queue, mail, google recaptcha and so on.  

&ndash; Install BKSCMS project:
```
cd <your project>  
php artisan bkscms:install
```  

Visit the application in browsers and log in to it with the credentials ***superadmin/superadmin1@***. Then, create a real user and assign it with **superadmins** role. Finally, disable the default **superadmin** & **administrator** user for security reason.  

