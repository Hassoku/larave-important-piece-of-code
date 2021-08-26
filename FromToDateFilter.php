<?php
function fromAndToDateFilter($from, $to, $query, $column = 'created_at', $strToTime = true)
{
    if (!empty($from) and !empty($to)) {
        $from = $strToTime ? strtotime($from) : $from;
        $to = $strToTime ? strtotime($to) : $to;

        $query->whereBetween($column, [$from, $to]);
    } else {
        if (!empty($from)) {
            $from = $strToTime ? strtotime($from) : $from;

            $query->where($column, '>=', $from);
        }

        if (!empty($to)) {
            $to = $strToTime ? strtotime($to) : $to;

            $query->where($column, '<', $to);
        }
    }

    return $query;
}

//Controller methods
private function filters($query, $request)
{
    $from = $request->get('from', null);
    $to = $request->get('to', null);
    $title = $request->get('title', null);
    $category_id = $request->get('category_id', null);
    $author_id = $request->get('author_id', null);
    $status = $request->get('status', null);

    $query = fromAndToDateFilter($from, $to, $query, 'created_at');


    if (!empty($title)) {
        $query->where('title', 'like', '%' . $title . '%');
    }

    if (!empty($category_id)) {
        $query->where('category_id', $category_id);
    }

    if (!empty($author_id)) {
        $query->where('author_id', $author_id);
    }

    if (!empty($status)) {
        $query->where('status', $status);
    }

    return $query;
}
