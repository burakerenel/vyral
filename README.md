
# Twitter Feeder Application

##For Installation & Test
```
php artisan migrate
php artisan test
```

## API Usage

### Register

```http
  POST /api/v1/register
```

| Field | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `full_name` | `string` | **Required** |
| `email` | `string` | **Required** |
| `password` | `string` | **Required** |
| `phone` | `string` | **Required** |
| `twitter_username` | `string` | **Required** |


##### Successful Example Response
```
{
    "message": "Registration Successful.",
    "token": "8|Cp7i0db0nuvHYZp55nCHB7S8YVTgBrG5BXM0wXa4"
}
```
<br /><br />

### Login

```http
  POST /api/v1/login
```

| Field | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `email`      | `string` | **Required** |
| `password`      | `string` | **Required** |

##### Successful Example Response
```
{
    "token": "9|dAYJMCzVhQfnaHJ9RUKKmfpznDxvi0Fat6gvQeEV"
}
```
<br /><br />

### Verify Check (Authorization Bearer)

```http
  POST api/v1/check-verify
```
##### Successful Example Response
```
{
    "email_verified_at": null,
    "phone_verified_at": "2022-03-06T15:14:02.000000Z"
}
```

<br /><br />


### Verify Send Code (Authorization Bearer)
```http
  POST api/v1/verify-send-code
```
| Field | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `type`      | `string` | **Required** |

##### Successful Example Response
```
{
    "email_verified_at": null,
    "phone_verified_at": "2022-03-06T15:14:02.000000Z"
}
```

<br /><br />

### Verify Code (Authorization Bearer)
```http
  POST api/v1/verify-code
```
| Field | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `type`      | `string` | **Required** |
| `code`      | `string` | **Required** |

##### Successful Example Response
```
{
    "message": "Validation Successful."
}
```

<br /><br />


### Get Tweets by Username (Authorization Bearer)
```http
  GET api/v1/get-tweets/{twitter_username}
```

##### Successful Example Response
```
{
    "data": [
        {
            "id": 240,
            "tweet_id": 21,
            "tweet_data": "{\"id\": \"21\", \"userId\": \"1\", \"content\": \"Omnis illo nihil dolor saepe. Ullam animi aut non. Numquam et explicabo qui sed deleniti vitae repudiandae.\", \"created_at\": 1646561884}",
            "status": "declined",
            "created_at": "2022-03-07T17:49:48.000000Z"
        },
        {
            "id": 255,
            "tweet_id": 96,
            "tweet_data": "{\"id\": \"96\", \"userId\": \"1\", \"content\": \"Fugiat quo unde corrupti aut quis consequatur sit. Quis provident voluptatibus. Suscipit ut molestiae. Corrupti voluptatem tempore officiis aut qui et eaque hic. Eos enim officiis suscipit.\", \"created_at\": 1646557384}",
            "status": "declined",
            "created_at": "2022-03-07T17:49:48.000000Z"
        },
        {
            "id": 254,
            "tweet_id": 91,
            "tweet_data": "{\"id\": \"91\", \"userId\": \"1\", \"content\": \"Nulla reiciendis laudantium est dolor nihil deleniti. Eum et aut aut cum. Sint quasi ipsa.\", \"created_at\": 1646557684}",
            "status": "declined",
            "created_at": "2022-03-07T17:49:48.000000Z"
        },
        {
            "id": 253,
            "tweet_id": 86,
            "tweet_data": "{\"id\": \"86\", \"userId\": \"1\", \"content\": \"Non dicta dolore nemo sit accusantium in quisquam est. Est aut rem quasi veniam. Omnis atque tempore tempore eum commodi. Aut in iusto in quas quae laudantium qui rerum.\", \"created_at\": 1646557984}",
            "status": "declined",
            "created_at": "2022-03-07T17:49:48.000000Z"
        },
        {
            "id": 252,
            "tweet_id": 81,
            "tweet_data": "{\"id\": \"81\", \"userId\": \"1\", \"content\": \"Quod voluptas quasi. Qui illum rerum similique qui iure cupiditate.\", \"created_at\": 1646558284}",
            "status": "declined",
            "created_at": "2022-03-07T17:49:48.000000Z"
        },
        {
            "id": 251,
            "tweet_id": 76,
            "tweet_data": "{\"id\": \"76\", \"userId\": \"1\", \"content\": \"Ad et autem vel voluptates. Aspernatur est praesentium ad sapiente sed necessitatibus vero voluptatibus. Et consequatur non et reiciendis eveniet totam.\", \"created_at\": 1646558584}",
            "status": "declined",
            "created_at": "2022-03-07T17:49:48.000000Z"
        },
        {
            "id": 250,
            "tweet_id": 71,
            "tweet_data": "{\"id\": \"71\", \"userId\": \"1\", \"content\": \"Placeat repellat vel libero vero voluptatem recusandae aut dolorum sapiente. Eligendi harum harum sint. Hic neque ut nihil sapiente. Ullam in molestiae eos dolor itaque fugiat quas omnis eum. Cum et magnam. Qui voluptatem distinctio blanditiis ipsam deleniti non.\", \"created_at\": 1646558884}",
            "status": "declined",
            "created_at": "2022-03-07T17:49:48.000000Z"
        },
        {
            "id": 249,
            "tweet_id": 66,
            "tweet_data": "{\"id\": \"66\", \"userId\": \"1\", \"content\": \"Quibusdam aut dolor necessitatibus repudiandae laboriosam velit qui. Iste doloribus nisi.\", \"created_at\": 1646559184}",
            "status": "declined",
            "created_at": "2022-03-07T17:49:48.000000Z"
        },
        {
            "id": 248,
            "tweet_id": 61,
            "tweet_data": "{\"id\": \"61\", \"userId\": \"1\", \"content\": \"Sed autem autem molestias impedit accusamus aut accusamus laboriosam. Quia doloribus rerum mollitia fugiat dolor qui. Pariatur aut consequuntur maiores in fugit enim neque est. Molestiae accusamus maxime est.\", \"created_at\": 1646559484}",
            "status": "declined",
            "created_at": "2022-03-07T17:49:48.000000Z"
        },
        {
            "id": 247,
            "tweet_id": 56,
            "tweet_data": "{\"id\": \"56\", \"userId\": \"1\", \"content\": \"Minima error molestias. Sed ducimus eum et doloremque sunt dolore qui. Ut pariatur quod quia incidunt perspiciatis et. Rerum officiis quae. Vitae qui sunt reprehenderit ut dolorem sint earum.\", \"created_at\": 1646559784}",
            "status": "declined",
            "created_at": "2022-03-07T17:49:48.000000Z"
        },
        {
            "id": 246,
            "tweet_id": 51,
            "tweet_data": "{\"id\": \"51\", \"userId\": \"1\", \"content\": \"Quia et et qui quisquam. Voluptatem magnam nihil ut quia. Illum incidunt debitis iure fugit nihil. Excepturi quas aliquam autem animi rerum odit modi veniam. Et est deserunt.\", \"created_at\": 1646560084}",
            "status": "declined",
            "created_at": "2022-03-07T17:49:48.000000Z"
        },
        {
            "id": 245,
            "tweet_id": 46,
            "tweet_data": "{\"id\": \"46\", \"userId\": \"1\", \"content\": \"Sed deserunt ut iusto quas nesciunt reprehenderit. Est excepturi ut eum fugit aliquid voluptatem omnis fugit mollitia. Dolorem autem quas eos. Aut nihil est sunt corporis laudantium.\", \"created_at\": 1646560384}",
            "status": "declined",
            "created_at": "2022-03-07T17:49:48.000000Z"
        },
        {
            "id": 244,
            "tweet_id": 41,
            "tweet_data": "{\"id\": \"41\", \"userId\": \"1\", \"content\": \"Qui quasi totam excepturi velit sed ut necessitatibus. Eius perspiciatis et impedit a veniam fuga consequatur illum vel. Tenetur veritatis ut dolorem hic voluptatem qui eligendi vero perspiciatis.\", \"created_at\": 1646560684}",
            "status": "declined",
            "created_at": "2022-03-07T17:49:48.000000Z"
        },
        {
            "id": 243,
            "tweet_id": 36,
            "tweet_data": "{\"id\": \"36\", \"userId\": \"1\", \"content\": \"Non quod ea autem. Voluptatem odit quidem. Culpa eum earum. Consequatur sed in eum ullam. Dolor maiores molestiae.\", \"created_at\": 1646560984}",
            "status": "declined",
            "created_at": "2022-03-07T17:49:48.000000Z"
        },
        {
            "id": 242,
            "tweet_id": 31,
            "tweet_data": "{\"id\": \"31\", \"userId\": \"1\", \"content\": \"Est ea numquam corrupti hic dolores. Nostrum inventore quod maiores. Dicta alias ut sint vitae facere fugiat.\", \"created_at\": 1646561284}",
            "status": "declined",
            "created_at": "2022-03-07T17:49:48.000000Z"
        },
        {
            "id": 241,
            "tweet_id": 26,
            "tweet_data": "{\"id\": \"26\", \"userId\": \"1\", \"content\": \"Ex quis repellat voluptatem. Est consequatur iure non. Qui eos aut vel. Voluptatem non consectetur consequatur aperiam quia perspiciatis occaecati aspernatur similique.\", \"created_at\": 1646561584}",
            "status": "declined",
            "created_at": "2022-03-07T17:49:48.000000Z"
        },
        {
            "id": 239,
            "tweet_id": 16,
            "tweet_data": "{\"id\": \"16\", \"userId\": \"1\", \"content\": \"Et modi dicta consectetur maxime. Quos soluta nesciunt dolor distinctio ipsam. Veritatis error quisquam odit. Corporis quia maxime eum eius et ipsa aliquid. Architecto nihil in sit fugit temporibus magni.\", \"created_at\": 1646562184}",
            "status": "declined",
            "created_at": "2022-03-07T17:49:48.000000Z"
        },
        {
            "id": 238,
            "tweet_id": 11,
            "tweet_data": "{\"id\": \"11\", \"userId\": \"1\", \"content\": \"Aspernatur doloribus ut velit commodi totam et officia. Eum et error maxime labore voluptate officia nihil. Saepe quam officia. Incidunt aut autem neque aut dignissimos ex quos.\", \"created_at\": 1646562484}",
            "status": "declined",
            "created_at": "2022-03-07T17:49:48.000000Z"
        },
        {
            "id": 237,
            "tweet_id": 6,
            "tweet_data": "{\"id\": \"6\", \"userId\": \"1\", \"content\": \"Commodi repellat voluptatem tempore est laudantium earum voluptatum molestias. Beatae omnis quia. Explicabo voluptate ut iusto aut.\", \"created_at\": 1646562784}",
            "status": "declined",
            "created_at": "2022-03-07T17:49:48.000000Z"
        },
        {
            "id": 236,
            "tweet_id": 1,
            "tweet_data": "{\"id\": \"1\", \"userId\": \"1\", \"content\": \"Voluptatem aut nulla consequatur qui. Incidunt harum laborum soluta minima.\", \"created_at\": 1646563084}",
            "status": "declined",
            "created_at": "2022-03-07T17:49:48.000000Z"
        }
    ],
    "links": {
        "first": "http://127.0.0.1:8000/api/v1/getTweets/Minnie.Lind?page=1",
        "last": "http://127.0.0.1:8000/api/v1/getTweets/Minnie.Lind?page=6",
        "prev": null,
        "next": "http://127.0.0.1:8000/api/v1/getTweets/Minnie.Lind?page=2"
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 6,
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/getTweets/Minnie.Lind?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/getTweets/Minnie.Lind?page=2",
                "label": "2",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/getTweets/Minnie.Lind?page=3",
                "label": "3",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/getTweets/Minnie.Lind?page=4",
                "label": "4",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/getTweets/Minnie.Lind?page=5",
                "label": "5",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/getTweets/Minnie.Lind?page=6",
                "label": "6",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/getTweets/Minnie.Lind?page=2",
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "path": "http://127.0.0.1:8000/api/v1/getTweets/Minnie.Lind",
        "per_page": 20,
        "to": 20,
        "total": 120
    }
}
```

<br /><br />


### Edit Tweet (Authorization Bearer)
status should be declined or published
```http
  POST api/v1/edit-tweet/{id}
```
| Field | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `tweet_data`      | `json` | **Required** |
| `status`      | `string` | **Required** |

##### Successful Example Response
```
{
    "tweet_id": 21,
    "tweet_data": "{\"id\": \"1\", \"userId\": \"1\", \"content\": \"Voluptatem aut nulla consequatur qui. Incidunt harum laborum soluta minima.\", \"created_at\": 1646563084}",
    "status": "published",
    "created_at": "2022-03-07T17:49:48.000000Z"
}
```

<br /><br />

