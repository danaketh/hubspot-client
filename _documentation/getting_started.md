---
title: Getting started
position: 2
parameters:
  - name:
    content:
content_markdown: |-
  First of all you're going to require HubSpot API key, which you can obtain by logging into your HubSpot account,
  clicking your profile icon an then going into **Integrations** -> **HubSpot API key**.
  
  When you have the API key, you can install the client into your project using Composer. After it's installed,
  you can create the instance in your code.
  
  ```bash
  composer require danaketh/hubspot-client  
  ```
  
  There are two ways of using this API. Either using the wrapper class `HubSpot`, which provides access to everything
  through a single object and can be useful when you're working with multiple endpoints at the same time. Or using
  each API class on it's own.
  
  ```php
  use danaketh\HubSpot\HubSpot;
  use danaketh\HubSpot\API\ContactList;
  
  $hubspot = new HubSpot('<API_KEY>');
  $listOfContacts = $hubspot->contactList()->all();
  
  $api = new ContactList('<API_KEY>');
  $listOfContacts = $api->all();
  ```
  
  To keep the documentation clean and easy to understand, we're only using each class directly.
left_code_blocks:

right_code_blocks:

---
