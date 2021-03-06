## Addon for the Appointmentts+ Plugin (WPMUDEV)

![Screenshot](https://img.shields.io/badge/build-passed-1ece30.svg) ![Screenshot](https://img.shields.io/badge/plugin-WPMUDEV-blue.svg) ![Screenshot](https://img.shields.io/badge/license-GNU_GPL_v2-red.svg) ![Screenshot](https://img.shields.io/badge/release-1.0.0-orange.svg)

__This is a Add on to the [Appointments +](https://premium.wpmudev.org/project/appointments-plus/) , it allows for custom email headers in outgoing messages. It lets you send multipart messages with base64 encoded images as part of the message itself.__


The problem is that it currently only works when you use the `<img href="some-url.jpeg">` approach. This is far from ideal because

 * This causes many users to not see the images until they agree to download "external resource" 
 * Most email systems classify your confirmation as SPAM because it linked to unknown domains/external resource.

A+ confirmation emails can be sent using HTML as a feature. This plugin lets you send messages like as shown in this screenshot

![Screenshot](http://i57.tinypic.com/30ttgzc.png)


### Usage 

#### Addon Mode

Simply download or copy paste the PHP file into the `appointments/includes/addons` folder and you will have new options in the admin screen.

#### Standalone plugin 

Download the zip file and upload it as part of the upload new plugin screen from the admin. It will show up in the list of installed plugins, simply click activate and it will work. You will have new options in the admin screen.

#### MU Plugin

Open up the `mu-plugins` folder in your WordPress Directory (or create one). Its usually located within the `wp-content` folder of your `public_html` folder. Select the PHP file `app-custom-email-headers.php` and place it in the `wp-content/mu-plugin` folder in your WordPress Directory. You will have additional options under display settings as shown in the screenshot below.

![Screenshot](http://i61.tinypic.com/be654k.png)
