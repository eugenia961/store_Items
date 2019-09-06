# StoreItems

Product Vision of the "StoreItems Application" is a store for management items and orders for different clients.

## Languages

PHP 7

## Frameworks

Phalcon 3

## Databases

Postgres 9

## IMAGES
![GitHub Logo](/img_readme/store_1.png)
![GitHub Logo](/img_readme/store_2.png)
![GitHub Logo](/img_readme/store_3.png)

Database schema:

```sql

CREATE DATABASE store;

CREATE TABLE public.items
(
  id character varying(36) NOT NULL, -- Primary key of the table
  item character varying(255), -- Item name
  description character varying(255), -- tem description
  sku character varying(14), -- Stock keeping unit
  quantity integer, -- Quantity in stock
  price numeric(10,2), -- Last unit price
  enabled character(1) DEFAULT 0, -- Indicator the item is enabled
  CONSTRAINT "PK_items" PRIMARY KEY (id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.items
  OWNER TO postgres;
COMMENT ON TABLE public.items
  IS 'Table with items';
COMMENT ON COLUMN public.items.id IS 'Primary key of the table';
COMMENT ON COLUMN public.items.item IS 'Item name';
COMMENT ON COLUMN public.items.description IS 'tem description';
COMMENT ON COLUMN public.items.sku IS 'Stock keeping unit';
COMMENT ON COLUMN public.items.quantity IS 'Quantity in stock';
COMMENT ON COLUMN public.items.price IS 'Last unit price';
COMMENT ON COLUMN public.items.enabled IS 'Indicator the item is enabled';

-- Table: public.users

-- DROP TABLE public.users;

CREATE TABLE public.users
(
  id character varying(50) NOT NULL, -- Primary key of the table
  name character varying(255), -- User name
  password text, -- User password
  email character varying(100), -- User email
  last_time_login timestamp without time zone, -- Last time the user login
  enabled character(1) DEFAULT 1, -- Indicator  the user is enabled
  CONSTRAINT "PK_users" PRIMARY KEY (id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.users
  OWNER TO postgres;
COMMENT ON COLUMN public.users.id IS 'Primary key of the table';
COMMENT ON COLUMN public.users.name IS 'User name';
COMMENT ON COLUMN public.users.password IS 'User password';
COMMENT ON COLUMN public.users.email IS 'User email';
COMMENT ON COLUMN public.users.last_time_login IS 'Last time the user login';
COMMENT ON COLUMN public.users.enabled IS 'Indicator  the user is enabled';

-- Table: public.carts

-- DROP TABLE public.carts;

CREATE TABLE public.carts
(
  id character varying(50) NOT NULL, -- Primary key of the table
  user_id character varying(50), -- Foreign key from users table
  creation timestamp without time zone, -- Creation date
  CONSTRAINT "PK_carts" PRIMARY KEY (id),
  CONSTRAINT "FK_users_carts" FOREIGN KEY (user_id)
      REFERENCES public.users (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.carts
  OWNER TO postgres;
COMMENT ON COLUMN public.carts.id IS 'Primary key of the table';
COMMENT ON COLUMN public.carts.user_id IS 'Foreign key from users table';
COMMENT ON COLUMN public.carts.creation IS 'Creation date ';

-- Table: public.carts_items

-- DROP TABLE public.carts_items;

CREATE TABLE public.carts_items
(
  cart_id character varying(50) NOT NULL, -- Primary key of the table. Foreig key from carts table
  item_id character varying(50) NOT NULL, -- Primary key of the table. Foreig key from items table
  quantity integer, -- Quantity
  unit_price numeric(10,2), -- Unit price from the moment  the cart was creating
  CONSTRAINT "PK_crats_items" PRIMARY KEY (cart_id, item_id),
  CONSTRAINT "FK_cart" FOREIGN KEY (cart_id)
      REFERENCES public.carts (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT "FK_items" FOREIGN KEY (item_id)
      REFERENCES public.items (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.carts_items
  OWNER TO postgres;
COMMENT ON TABLE public.carts_items
  IS 'Table with carts detail';
COMMENT ON COLUMN public.carts_items.cart_id IS 'Primary key of the table. Foreig key from carts table';
COMMENT ON COLUMN public.carts_items.item_id IS 'Primary key of the table. Foreig key from items table';
COMMENT ON COLUMN public.carts_items.quantity IS 'Quantity';
COMMENT ON COLUMN public.carts_items.unit_price IS 'Unit price from the moment  the cart was creating';
```
## Installation

To Run you need to enter the following folder /store/app and execute the following commands

```bash

php cli.php fixtures_load user
php cli.php fixtures_load item

```

## Usage

The login users are:

User: admin@admin.com
Password: admin

User: admin2@admin.com
Password :admin2
