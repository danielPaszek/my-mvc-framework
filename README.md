## My own mvc framework

### Still in building :)

It has build in user registration, database support.
Middleware and guards ???

### Special View files:

\_app.php -> Wrapper Layout. To insert content use: {{content}}
/components/ -> Folder where you can put all your reusable components.

#### Components name have to match filename.

For nested components use special characters like dot. (Idk why underscore doesnt work), beacause components are rendered alphabetically (DOM Tree not implemented [and won't be :D]).
So if you have structure like Navbar->Link make sure you have ".Navbar.php" file and {{.Navbar}} in your template.
