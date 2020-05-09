---
extends: _layouts.talk
title: 'Klassroom presents the Techtalk: Scaling API with Laravel'
date: '2020-05-09'
gist: I was interviewed by Sumon Molla Selim on his web podcast about APIs and how to create them with Laravel.
section: content
syntaxHighlight: false
---

I was invited to talk about Laravel API development and scaling on Muhammad Sumon Molla Selim's weekly web podcast **Klassroom presents the Techtalk**. We talked about a bunch of different things about API development for about 2 hours.

<iframe width="600" height="337.5" src="https://www.youtube.com/embed/5Kr04SkX2Qk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

Here are the gist of my talk and various references on how to build and maintain a suntainable API in Laravel.

#### STEP 1

- Just returning an array as response will make an API. Laravel's Response class implements Arrayable, Jsonable, ArrayObject and JsonSerializable interface. So, anything that implements these interface will return a json response.
- Laravel Eloquent makes it even easier, just return any Model object or Collection, it will automatically cast it to json. Even it has built in feature to hide any specific column from the entity through `$hidden` attribute. It also protect us from mass assignment.
- It has built in middlewares to take care of CORS, API throttling and other common issues.
- Laravel has builtin auditing feature like `created_at`, `updated_at` timestamp, and it's very easy to add `created_by`, `updated_by` to your model.
- Use proper HTTP response code and headers in your response.
- Use proper HTTP verb and stick with one convention for for URL pattern.

#### STEP 2

- You should never expose your database schema through API. You could use Laravel's API Resource to transform your Model response. For more control use something like [`league/fractal`](https://fractal.thephpleague.com/), or it's laravel bridge [`spatie/laravel-fractal`](https://github.com/spatie/laravel-fractal) for ease of use.
- Don't expose your database IDs. Use generated complex id like `uuid`. You could use [`ramsey/uuid`](https://uuid.ramsey.dev/).
- Do proper validation. Use laravel's validator, give proper validation error response.
- Use Eloquent as long as it's serving your purpose, but don't hesitate to jump to SQL.
- Consider your database a shared resource, even a single slow endpoint can make the whole API suite slower.
- Use a profiler like [blackfire.io](https://blackfire.io/) or at least use [`barryvdh/laravel-debugbar`](https://github.com/barryvdh/laravel-debugbar).
- Don't return the full model object where only a few column needed. Allow user to ask for the data they needed. You could use something like [`spatie/laravel-query-builder`](https://github.com/spatie/laravel-query-builder) for that. You could also enable sorting feature by using [`spatie/eloquent-sortable`](https://github.com/spatie/eloquent-sortable) package.
- Always return paginated response while returning a Collection. If needed make an option to ask for the number of objects they needed.
- Do not hard delete sensitive data, use soft delete instead.
- Use a proper monitoring tool for your API like [newrelic](https://newrelic.com/).

#### STEP 3

- For API authentication you could use simple [token based authentication](https://laravel.com/docs/6.x/api-authentication), [JWT](https://jwt-auth.readthedocs.io/en/develop/), [Sanctum](https://laravel.com/docs/7.x/sanctum#introduction) or [Passport](https://laravel.com/docs/7.x/passport) based on your need.
- For advanced searching use something like [Laravel Scout](https://laravel.com/docs/7.x/scout).
- Use caching where ever possible, use proper [`ETag`](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/ETag) header, and handle [`If-None-Match`](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/If-None-Match) header in the request. Laravel also provide a [`cache.headers`](https://laravel.com/docs/7.x/responses#attaching-headers-to-responses) middleware out of the box, you can use that to handle api caching too.
- Do not load unused classes, disable them from `config/app.php` file.
- For localization, you can use [`spatie/laravel-translatable`](https://github.com/spatie/laravel-translatable) package.

#### STEP 4

- Use [`HATEOAS`](https://en.wikipedia.org/wiki/HATEOAS) (Hypermedia as the Engine of Application State).
- Use an API standard like [`json:api`](https://jsonapi.org/), you could use [`cloudcreativity/laravel-json-api`](https://laravel-json-api.readthedocs.io/en/latest/), [`cloudcreativity/json-api-testing`](https://laravel-json-api.readthedocs.io/en/latest/) and [`spatie/laravel-json-api-paginate`](https://github.com/spatie/laravel-json-api-paginate) to easily achieve that. Column filter and compound documents implies almost the same features as GraphQL.
- Use proper API versioning, maintain backward compatibility.
- Write test, test, test!
- Use custom response code for explaining different situation if your API suite id fairly big like Braintree does for their APIs.

Enjoy!!
