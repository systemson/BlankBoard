# BlankBoard (70%)
Laravel, AdminLTE template and user authentification.

The Users, Roles and Permissions are currently fully developed. While the Message handler is at 70%.

1- Users
Using Laravel's API with BlankBoard you're able create new users, assing roles (or not) to the users to grant access acording to the needs of you app.

2- Roles
Roles are created within the GUI. You can attach permissions to the roles.

3- Permissions
Permissions are created directly thruough the module's Controller. On the instiantiation of the Controller (would be moved to an independent action, to register the Controller on demand). The GUI don't let you creater or delete the Permissions. If you want to remove any permission from you APP, just deactivate the desired permission.

3- Messages 70%
The GUI, when completed, will grant the users the ability to comunicate with every other user. You will be able to create, send and delete messages. If you want you can store messages as drafts to be procesed in the future.

ToDo:
**This list should be updated**

* Add form validations to every form.
* Move Controller registration to a independent action.
* Improve ResourceController authentification.
* Improve permission registration.
