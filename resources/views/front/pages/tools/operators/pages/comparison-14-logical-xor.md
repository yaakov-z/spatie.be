---
title: $a xor $b
teaser: "Logical xor"
category: comparison
tags: [comparison, logical, xor]
related: []
---

```php
true xor false; // true
false xor true; // true
true xor true; // false
false xor false; // false
```

Also works with truthy and falsy values:

```php
1 xor 0; // true
1 xor '1'; // false
0 xor ''; // false
```
