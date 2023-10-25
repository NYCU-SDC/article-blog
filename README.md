# NYCU_SDC-article_blog
## Structure
```
article_list.html
    |_ article_list.js
    |_ read_article_list.php
|_ article.html
    |_ article.js
    |_ read_article.php
    |_ delete.js
    |_ delete.php
|_ edit_article.html
    |_ create_update.js
    |_ create.php
    |_ update.php
```
### Other Files
- `connection.php`: For database connection. Every php file require this php file to connect to database.
- `tryout.php`: For lesson introduction needed.
- `validatoin.js`: It can not be applied on validation in `edit_article.html`.
## SDC Practices
### Read (article content)
- `article.js`: practice 1~3
### Create
- `create_update.js`: parctice 4
- `create.php`: practice 6~7
### Update
- `create_update.js`: practice 5
### Delete
- finish `delete.js` and `delete.php`
## To be Finished
- Redirect webpage may not success `window.location.href = `article_list.html`;`
