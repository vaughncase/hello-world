<?php


abstract class Transformer
{

    public function transformCollection($items)
    {
        $items_array = [];
        foreach ($items as $item) {
            $item = is_array($item) ? $item : collect($item)->toArray();
            if (isset($item['created_at'])) {
                $item['created_at'] = (double)\Carbon\Carbon::parse($item['created_at'])->timestamp;
            }
            if (isset($item['updated_at'])) {
                $item['updated_at'] = (double)\Carbon\Carbon::parse($item['updated_at'])->timestamp;
            }
            array_push($items_array, $item);
        }
        $items = array_values($items_array);

        return array_map([$this, 'transform'], $items);
    }

    public function transformCollectionKeepFormat($items)
    {
        return array_map([
            $this,
            'transform'
        ], $items);
    }

    public abstract function transform($item);

}