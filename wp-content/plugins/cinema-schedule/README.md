# Cinema-schedule
A plugin to manage and display cinema schedules

## How it works
On page load, a mini-router will check the route, aka the page to display.
If the route is not found, then a 404 page is displayed.
If the route is found, then the corresponding page will be displayed.

Those pages are located in the ``/pages`` directory.
This system allows for cleaner actions when managing schedules and cleaner code.

### More details ? (Warning: boring)
- On the admin plugin page, the plugin will define a bunch of constants, to ease the development process of the plugin.
- Then, the plugin registers the activation hook that will create the necessary table in the database.
- After that, the plugin will create an entry in the admin menu sidebar
- And then, will register it's css and js assets.

On the main page, the plugin will pull the previous schedules, iterate over them and place the inputs for editing the codes and schedules.
When the user will submit the form, the plugin will receive 2 arrays: "*old*" and "*new*".
Old contains previously saved schedules and is for editing and deleting previous entries in the database.
New is for adding new entries in the database.

Those 2 arrays are created via the "*name*" tag in the HTML inputs in the form.
The 2 arrays contains the schedules to add, edit or delete, and are under the following format:
```php
[
    "code" => "(the shortcode)",
    "schedules" => [
        "schedule1",
        "schedule2",
        "schedule3",
        "etc..."
    ]
]
```
*Note: The structure between those 2 arrays differ slightly, because a single entry in the "old" array have as its key as it's id in the database.
This ID is used to edit the correct entry in the DB, and avoid editing the wrong entry in the database if two codes are to be reversed with each other.

And then, when the plugin have added, edited and removed corresponding edits made earlier in the form, the page will redirect to the index page of the plugin.


## What does this plugin do
On enable, this plugin will create a new table in the database named "*cinema_schedule*".
When you will enter new schedules, delete or edit old schedules, the plugin will only interact with said table, by storing the codes and the provided schedules.

## How to use the codes I entered in the admin panel ?
1) The first step is to make sure the "*cinetheme*" theme is active.
2) Then, copy the "*code*" part of the movie you want to display schedules in the plugin admin page.
3) Next, go to the article you want to display schedules.
4) Insert a block "shortcode", and insert the following: `` [schedule film='(paste your code here)'] ``.
5) Save, go to the article view and taadaa, a wild schedules bloc appears !