# Sample Task

This repo serves as the basis for a programming exercise designed to demonstrate a candidate's basic competence with the Laravel framework and ability to design and implement a solution to a real-world business problem.

The repo contains an empty Laravel project. The candidate should fork the repo, complete the assigned task and then submit a Pull Request with the completed work.

## Project specifications

### Overview

The goal of this project is to create flatfile data feeds from a catalog of Products. Each feed should be customized to fit the specifications of the B2B partner that requested the data.

The feeds should be generated via an Artisan command that is scheduled multiple times per day.

### Entities

- the product catalog consists of Products
- a Product has a series of properties
    - unique product code
    - name
    - brand
    - category
    - description
    - variant type (size/color/simple)
- a Product may have one or more Variants
- a simple Product has exactly one Variant

- a Variant has a series of properties
    - unique sku
    - GTIN code
    - variation value (red/blue/S/M/L/etc.)
    - quantity in stock
    - status (available/sold out)

- the business maintains two Price Lists (Europe/International)
    - a Price List has a reference currency (EUR/USD)

- a Variant has one Price for each Price List
- Variants of the same Product may have different Prices

- a Price has a series of properties
    - list price
    - sale price
    - sale start
    - sale end
- Prices are stored internally in minor units of the reference currency (cents)

### Data feeds

The task is to create a data feed for our two B2B partners PartnerA and PartnerB. Each feed has its own specifications:

#### PartnerA feed

PartnerA sells in the US market and takes their prices from the International Price list. We have an agreement with PartnerA that they get a 15% discount on our current selling price (cost price). The feed should contain only items that are currently available for purchase. The feed should be in CSV format with headers in the first row. The feed should be updated every 4 hours.

##### Feed file format

- product code
- variant sku
- name
- brand
- category
- description
- variant type
- variant value
- GTIN code
- quantity in stock
- list price
- sale price
- cost price

#### PartnerB feed

PartnerB sells to the Italian market and takes their prices from the Europe Price list. They invoice us at a later date for their commission so there is no need to include a cost price.

Our margins are lower with this partner so we cannot afford to sell items at a discount of > 30% off. Items with a higher discount level should have their sale price reset to be 30% off.

Example: list price $100, sale price $50, feed sale price $70

The feed should contain only items that are currently available for purchase. The feed should be in TSV format with headers in the first row. They ask that we use their field names in Italian. The feed should be updated once per hour.

##### Feed file format

- CodiceProdotto (product code)
- Sku
- Nome (name)
- Marca (brand)
- Categoria (category)
- Descrizione (description)
- Tipo (variant type)
- Valore (variant value)
- GTIN
- Quantita (quantity in stock)
- PrezzoListino (list price)
- PrezzoSaldo (sale price)
- Sconto (discount level)


### Additional information

The product catalog contains approximately 50,000 products and 100,000 variants. Around 40,000 variants are in stock and available for purchase at any one time. Ensure that your solution can generate feeds of this size in a reasonable amount of time.

## Technical requirements

Use the latest version of Laravel 8. Use either PHP 7.4 or PHP 8. You may choose any database storage solution. Feel free to pull in whatever 3rd party packages you require. Use your preferred testing framework.

## Evaluation criteria

We will be evaluating the following:

- ability to translate project specifications into database design and business domain
- how well the solution fulfils all of the project requirements
- correctness of the provided solution
- quality of the code produced
    - clarity and readability
    - organization of code
    - ability to leverage the Laravel framework
    - creation of migrations, factories and seeders
    - presence and quality of unit tests


