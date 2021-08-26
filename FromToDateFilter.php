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
