---
title: Response
position: 3

response:
  - name: code
    content: HTTP code of the response
  - name: body
    content: Actual response from the API endpoint as `array`
  - name: content-type
    content: Content-Type header returned by the endpoint

content_markdown: |-
  Every response returned by the client has the same structure with some useful information which may come in handy
  if you ever need to do more than just get one or two things from time to time. Response is returned as an `array`.
  
  If for some reason the endpoint can't be reached, client throws an exception `RequestException` with the reason. 

left_code_blocks:

right_code_blocks:
  - code_block: |2-
      [
        'code' => 200,
        'body' => [],
        'content-type' => 'text/html'
      ]
    title: Response
    language: php

---
