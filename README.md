# Laravel Command Utils

Add util methods to laravel commands

## Methods

### Banners

```$this->banner('message'[, $options_as_array])```

![Banner](http://i.imgur.com/ImOTNbh.png)

```$this->softBanner('message'[, $options_as_array])```

![Soft Banner](http://i.imgur.com/XjXe4SR.png)


### Headers

```$this->header('message'[, $options_as_array])```

![Header](http://i.imgur.com/qPk1LAw.png)

```$this->softHeader('message'[, $options_as_array])```

![Soft Header](http://i.imgur.com/nKN99r6.png)



### Titles

```$this->title('message'[, $options_as_array])```

![Title](http://i.imgur.com/cqlDBrZ.png)

```$this->softTitle('message'[, $options_as_array])```

![Soft Title](http://i.imgur.com/579lkoK.png)

### Paragraph Title

```$this->paragraphTitle('message'[, $options_as_array])```

![Paragraph Title](http://i.imgur.com/dIYTTwK.png)


### Ordered List

```$this->orderedList($items[, $options_as_array])```

![Ordered List](http://i.imgur.com/awXdZ1L.png)


### Unordered List

```$this->unorderedList($items[, $list_item_char])```

![Unordered List](http://i.imgur.com/C7DnzFN.png)


### Continue to use previous ordered list index

```php
$this->softTitle('Accusamus ea sit eos iusto dolore nemo.');
$index = $this->orderedList($items);

$this->softTitle('Aliquid quam ea error provident et.');
$this->orderedList($items, $index);
```

![Continue previous ordered list](http://i.imgur.com/QlE1ffM.png)



### Dynamic ordered lists

```php
$this->softTitle('Publish files');

while($file = array_shift($files)){
    $this->line($this->getListIndex().$file->getFilename());
}
```

![Dynamic ordered lists](http://i.imgur.com/MrtWHwf.png)

### Reset dynamic ordered list index

```php
$this->softTitle('Ut qui suscipit sequi sed.');
foreach ($items as $item) {
    $this->line($this->getListIndex().$item);
}

$this->resetOrderedList(30);

$this->softTitle('Eum beatae ea qui non aliquam.');
foreach ($items as $item) {
    $this->line($this->getListIndex().$item);
}
```

![Reset index](http://i.imgur.com/QlE1ffM.png)