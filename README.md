## Install

https://www.yiiframework.com/extension/yiisoft/yii2-app-advanced/doc/guide/2.0/en/start-installation#installing-using-composer

https://www.yiiframework.com/doc/guide/2.0/en/start-installation
- `composer create-project --prefer-dist yiisoft/yii2-app-basic basic`
- `composer create-project --prefer-dist yiisoft/yii2-app-advanced advanced`

### Initialize (advanced)

https://forum.yiiframework.com/t/index-php-missing-in-yii2-advanced/81096/2
`php init`

### Migrate (advanced)

- https://www.tutorialspoint.com/yii/yii_database_migration.htm
- https://www.yiiframework.com/extension/yiisoft/yii2-app-advanced/doc/guide/2.0/en/start-installation#preparing-application
1. Setup database.
2. `php yii migrate`

### Scaffolding

1. Create database and tables and relations
2. GII https://www.yiiframework.com/doc/guide/2.0/en/start-gii
	- Generate Models
	- Generate CRUD
3. If on advanced Yii2, tweek `namespace app\controllers;` to `namespace frontend\controllers;` in the controller.
4. Turn simple text inputs into drop menus in the search form: https://stackoverflow.com/questions/38577958/yii2-dropdown-in-gridview-widget-filter/38578021
5. Turn simple text inputs into other input field types in the create or update forms: edit `views/{MVC feature}/_form`

## Tutorials

1. https://www.youtube.com/playlist?list=PLArrUrXAJsAidV4kkUxZdv0546SGpcg6q
2. https://www.youtube.com/playlist?list=PLRd0zhQj3CBmusDbBzFgg3H20VxLx2mkF

- https://www.youtube.com/playlist?list=PLRFcevDKdig7Ja-Q7fmRGaX89MYa77jQ6
- https://www.youtube.com/playlist?list=PLsjkcWMUNIT6GWvLYWmcLaS1tNWAzNTwT
- https://www.youtube.com/playlist?list=PLpNYlUeSK_rn_3mWq_vPt_jKz6cp7a6sZ
- https://www.yiiframework.com/doc/api/2.0
	- https://www.yiiframework.com/doc/api/2.0/yii-grid-gridview
- https://yii2-framework.readthedocs.io/en/stable/
	- https://yii2-framework.readthedocs.io/en/stable/guide/db-query-builder/

- https://github.com/yiisoft/yii2-jui
- https://github.com/2amigos/yii2-ckeditor-widget

- https://www.yiiframework.com/doc/guide/2.0/en/security-authorization#configuring-rbac
- https://www.yiiframework.com/doc/api/2.0/yii-rbac-dbmanager

- https://www.youtube.com/watch?v=sRJ6GYiCwkI
- https://www.youtube.com/playlist?list=PLMyGpiUTm106xkNQh9WeMsa-LXjanaLUm
- https://www.youtube.com/playlist?list=PLYY5hYwm2ks1Evkiu8sPO7CsJV32LGeJt

- Yii v1 vs v2: https://stackoverflow.com/a/46744576
- Yii1: https://www.youtube.com/playlist?list=PLRd0zhQj3CBnYFqV6YxkwBKIBFsj2Zc36
- Yii2: https://www.youtube.com/watch?v=whuIf33v2Ug
- Making APIs: https://www.yiiframework.com/doc/guide/2.0/en/rest-quick-start
- Routing
	- https://www.yiiframework.com/doc/guide/2.0/en/rest-routing
	- https://www.tutorialspoint.com/yii/yii_url_routing.htm
	- https://www.yiiframework.com/doc/guide/2.0/en/runtime-routing
- Active Record: (PS: Active Record is just a pattern https://en.wikipedia.org/wiki/Active_record_pattern)
	- Yii1: https://www.yiiframework.com/doc/api/1.1/CActiveRecord
	- Yii2: https://www.yiiframework.com/doc/guide/2.0/en/db-active-record
		- https://forum.yiiframework.com/t/yii2-model-relations/87356

## Access

{domain}/frontend/web/
{domain}/backend/web/

## Permissions

- Role Based Access Control: https://www.youtube.com/watch?v=tMNJi9jaCrY
	- https://www.yiiframework.com/doc/guide/2.0/en/security-authorization#rbac
- A more manual way of achieving this: https://www.youtube.com/watch?v=eFOIUeU-Y74
- More detail: https://www.youtube.com/watch?v=vLb8YATO-HU

---

## To Do

- RBAC
- Modules (self-contained MVC apps with the overall Yii app. Eg: Gii is a module)
- Email creds (Google)

---

## Yii v1

https://github.com/Ruslan-Aliyev/Yii1_CRUD
