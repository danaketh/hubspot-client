---
title: ::list
position: 1.1
type: get
description: List all of the blogs for a portal. Supports paging and filtering.

parameters:
  - name: $filters
    type: array
    content: Array of filters applied to the result

filters:
  - name: limit
    type: integer
    content: The number of items to return. Defaults to 20
  - name: offset
    type: integer
    content: The offset set to start returning rows from. Defaults to 0
  - name: created
    type: array
    content: |-
        `exact`, `range`, `gt`, `gte`, `lt`, `lte` - When the post was first created, in milliseconds since the epoch
  - name: deleted_at
    type: array
    content: |-
        `exact`, `range`, `gt`, `gte`, `lt`, `lte` - When the post was deleted, in milliseconds since the epoch. Zero if the blog post was never deleted. Use a DELETE request to delete the post, do not set this directly
  - name: name
    type: array
    content: |-
        `exact`, `range`, `gt`, `gte`, `lt`, `lte` - The internal name of the blog

response:
  - name: allow_comments
    type: boolean
    content: Are comments enabled for the blog

content_markdown: |-
    Examples  

endpoint_url: https://developers.hubspot.com/docs/methods/blogv2/get_blogs

left_code_blocks:
  - code_block: |-
      $blogs = $blog->list([
        'name' => [
            'exact' => 'Example blog'
        ]
      ]);
    title: PHP
    language: php
    
right_code_blocks:
  - code_block: |2-
      [
        [
            ''
        ]
      ]
    title: Response
    language: json
  - code_block: |2-
      {
        "error": true,
        "message": "Invalid offset"
      }
    title: Error
    language: json

---
