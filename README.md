SeedChat
========

The aim of this project is to provide an encrypted chat, with a very easy installation. But it is still quite far of a first release. These files work in some sort of way, with some bugs, **and the chat is not encrypted yet**. Anyway, can still be very useful.
                                                                                                                                                                                                             
If you want to try as it is, here are some instructions. You may need to edit some scripts and/or adjust some permissioning stuff.

![chat](http://www.paulodev.com.br/images/seedchat/chat.png "yet another ready to use chat")

### Usage 1: Damn simple install ###

Create a folder inside your web hosting, and put there all files from [commons folder](https://github.com/paulera/seedchat/tree/master/common).

Maybe you will need to create an *empty chat.html* file, with group write permissions, as this:
```bash
touch chat.html
chmod g+w chat.html
```

### Usage 2: With rooms management ###

#### Installation ####

* Create the folder *~/public_html/chat*. This folder will store the **index.php** for creating and removing rooms (optional), and also the rooms folders themselves.
* Create the folder *~/workspace/seedchat*, go to it and run
``` bash
git clone https://github.com/paulera/seedchat
```
. This folder will centralize the chat funcionality.
* Edit the files *createroom*, *removeroom* and *link_me_index.php*, changing the value of the following variables:

```bash
ROOMS_ROOT -> It must points to the public_html/chat folder
CHATCREATOR_ROOT -> It must points to the workspace/seedchat folder

IMPORTANT: use absolute path, without the '~' symbol
```

#### Usage ####

##### Enable room manager #####

![rooms-manager](http://www.paulodev.com.br/images/seedchat/rooms-manager.png "Rooms manager")

Place a link inside the **public_html/chat** folder pointing to *workspace/seedchat/link_me_index.php*, this way:
```bash
ln -s /home/paulera/workspace/seedchat/link_me_index.php /home/paulera/public_html/chat/index.php
```

This *index.php* calls the createroom and removerooms scripts from a web page. Also list the subfolders of **public_html/chat** as chat rooms.

##### Creating a room in terminal #####

Use the script _**createroom** &lt;room name&gt;_. It will:
* Create a subfolder inside **public_html/chat**. It will be the room's folder.
* Create the *chat.html* file, with group write permissions.
* Link all files inside **workspace/seedchat/common** to the chat room folder.
 
You can manually do exactly these 3 steps to create a room entirely by hand.

##### Removing a room in terminal #####

Use the script _**removeroom** &lt;room name&gt;_. It will:
* Unlink everything inside the chat room folder.
* Create a folder inside **workspace/seedchat/trash** named *roomame_YYYYMMDD_HHMMSS*.
* Backup the chat.html file (the chat history) inside the created subfolder.
* Remove the room's folder inside *public_html/chat*

##### Removing a room by hand #####

Remove the chat room specific folder and you are done. 

