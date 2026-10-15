# How to study these Otutor changes

Read this file first. Then open the matching file in `annotated/`. Each annotated file starts with a comment that explains what changed and why. The code under that comment is the real file.

The folder next to this one, `otutor/`, is the same code without the study notes. That is the copy you would upload to a server.

Open the new page at `app/index.html` after the site is on PHP. It will not run by itself in a browser with no PHP, because login needs MySQL.

## What was added, in the order you should read it

1. `style/otutor-mobile.css` and the two headers. Yesterday. Phones get a viewport tag and a Menu button. Desktop stays the same above 900 pixels.
2. `functions_fibon.php`. Shared helpers. `password_hash` stores a password. `otutorPrepare` is a query with a `?` placeholder so user text cannot change the SQL. `otutorUserTable` only allows four table names that belong to the logged-in student.
3. `fibon_login.php` and `fibon_form.php`. The old login compared `SHA()`. The new one uses `password_verify`. Old accounts still work once, then the stored password is upgraded. The signup email no longer contains the password.
4. `startsession.php`. A cookie used to be enough to log in. It is not anymore. The session is the login.
5. `api/login.php`, `api/lessons.php`, `api/logout.php`. These are the server half of a full-stack app. They answer in JSON instead of printing a whole HTML page.
6. `app/index.html`, `app/app.js`, `app/app.css`. This is the browser half. React draws the screen. `fetch` asks the API. You do not need a build tool to read it. A job site would usually compile JSX. `htm` is used here so the file stays readable.
7. The lesson, game, tool, and saved pages, plus profile, test, and progress updates. Queries that used to paste a username or a posted value into SQL now use `?` or a checked table name.

## A request, in one picture

The React page sends:

`POST /api/login.php` with `{ "username": "...", "password": "..." }`

PHP checks the hash, starts a session, and answers `{ "ok": true, "username": "..." }`.

The page then sends:

`GET /api/lessons.php`

PHP answers `{ "lessons": [ ... ] }` and React draws the list. That is the full stack: browser, API, database.

## What this is not yet

The video player, the sentence maker, and the old lesson page are still the original screens. The React page only logs in and lists lessons. `mainQuery.php` is an old setup scrap and was left alone.
