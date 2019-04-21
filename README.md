# bitten-c00kie documentation.

The main purpose of this web application is to mantain a strict line between users and their own security around the websites they visit, the extensions they install and TO PROVE THEM how it can put in risk their online-credentials and sensitive information such as passwords.

##### Disclaimer
> This application is only for educational purposes and should not be used to harm any real user data. I am not responsible for any misuse of the application itself.


## Web application description
This application was built with PHP along HTML5. This means that it can be run on any server that has support for PHP. The original idea of this merged from a simple talk when I was at university and my classmates were arguing about how secure websites are nowadays and that its pretty much impossible to find a vulnerability on them where real-users credentials could be leaked. So, that got my attention and decided to say: "Well, it is actually possible. There's still a big breach of security around lack of knowledge from user around topics like IT Security, how the web works, what could happend if someone manages to inject JavaScript code into your web browser, etc". So, with this, I was given a big "prove it" from me to myself and I thought what a better explaination of this than to make a simple web application with a great looking UI and a "hacking-like" design. For me as a developer it was fun to do it, but for other people, it could be magic.

## How to install?
You need to download the latest release on the releases section, with this you will be able to upload and extract it to any server of your choice and run it for testing. The app is meant to be placed in a specific route from your server directory, which is: ```SERVER_ROOT/p/```.

## What do I need to config before running it?
At first, you need to make sure that every file is correctly downloaded. I'd recommend testing it first on a local development environment just to make the neccesary configurations before sending it to a webserver. 

The things you need to change on the code are the following:
* In ```Config.php``` you need to add an array variable named ```$users``` with every instance of it should be an object with the following structure:

```
$users = [
  {
    "key": "NUMERIC_KEY",
    "user": "username",
    "pass": "user_password",
    "picture": "a/link/to/a/picture"
  },
   {
    "key": "NUMERIC_KEY",
    "user": "username",
    "pass": "user_password",
    "picture": "a/link/to/a/picture"
  }
];
```

And this must be set for every user you want to give acces to the application. Once this is done, you can upload your files to the server of your choice and if you uploaded it correctly at ```/p/```, it should be up and running.

Enjoy!
