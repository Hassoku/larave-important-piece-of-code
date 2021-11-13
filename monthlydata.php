<?php
$applications = DB::table('applications')->select(DB::raw('DATE(created_at) as created_at'), DB::raw('COUNT(*) as total'))->
        groupBy(DB::raw('DATE(created_at)'))->
        get();



    