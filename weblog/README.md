#WEBLOG
this is a blog project i created when i was still new to php but not a complete beginer.

*The project is majorly PHP and HTML, with MySQL database.
*Ith allows the blog owner to make new blog entries, though dashboard to make this task easy to the user has not yet been provided(New entries are currently done directly tho the database through SQL commanda, as shown in the SQL script-*weblog.sql*, in the sql_script sub-directory).
*New blog entries are then displayed- upon successful post, in the *index.php* page.
**Note that: the entries are made within specific categories.** and all the categories can then be viewed from *view_cat.php* file, shown to the user/ blog visitor.
*an entry can be viewed singly from the view entry page (*view_entry.php*).
*it allows for user sing up - *user.php* and login- *login.php*. On successful login, they are then redirected to the index page *index.php* if they are site visitors.
there is no admin login provided yet.
*All the project constants loke database connection, header and footer templates are in the includes sub-folder
in the files *config.php* for database connection credentials and configuration setings like base-directory and blog name and blog author, *header.php and footer.php* respectively.
*comments can also be made on the blog posts by page visitors. though directly to the databse still as i have not yet provided a UI to make it easy and faster.