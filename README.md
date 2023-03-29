# Recipe Api

This is a simple API for managing recipes

## Installation

1. Install dependecies:

    ```bash
        composer install
    ```

2. Create .env file

    ```bash
        cp .env.example .env
    ```

3. Generate key

    ```bash
        php artisan key:generate
    ```

4. Edit database settings on .env file

5. Run the migrations with seed

    ```bash
      php artisan migrate --seed
    ```

## Usage

There are 5 endpoint (postman collection is on the root folder `recipe_api_postman_collection.json`)

```
  GET       api/recipes ...................... recipes.index › RecipeController@index
  GET       api/recipes/{recipe} ............. recipes.show › RecipeController@show
  POST      api/recipes ...................... recipes.store › RecipeController@store
  PUT       api/recipes/{recipe} ............. recipes.update › RecipeController@update
  DELETE    api/recipes/{recipe} ............. recipes.destroy › RecipeController@destroy
```

1. These methods allows us to make simple CRUD operations.

2. All requests should be in JSON format. All responses are returns also JSON format.

3. I prepared postman collection
   1. On the root folder. filename: `recipe_api_postman_collection.json`
   2. It has all get,post,put,delete examples
   3. All examples have data including post, put, delete
   4. Default get api/recipe/{recipe} example is get api/recipes/1 and if returns "Record not found." probably this record's deleted_at column is not null (removed example). Because data coming from seeder randomly.

Notes:
What I didn't do:
1. I didn't add any views.
2. I didn't put an authentication middleware like `auth:sanctum` because its a demo project. At first I was added but commented later.
3. I didn't handle the some sql errors like `SQLSTATE[HY000]: General error: ...`, if APP_DEBUG is set true this error will show. Otherwise just displays `server error`.
   1. Its not a error actually. Its the default way but I want to mention.
   2. Examples: if user_id is not given on the post request or max string size is passed this error will show
4. I didn't handle to duplicate data case on create/update.
   1. Maybe I should add unique option to title column. In the RecipeRequest class unique option can be add next to required option. This was a good approach
   2. But in this case I have to add another controls. I passed it right now.
5. Lastly, I made a `ingredients` column but normally I would make this as another table, not a column. Then I will add relationships probably. But I used relationship in the Recipe model. When using the get Requests, user will show. So I didn't want to make another table and new relationship.


