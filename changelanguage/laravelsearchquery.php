<?php
$course = Course::query();
            $course->orWhere("course_title", "LIKE", "%{$request->title}%")->with('category')->with('teachers');
            $courses = $course->get();