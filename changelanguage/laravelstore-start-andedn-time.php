
    <?php
    public function saveTime(Request $request)
    {
        $user = auth()->user();
        $meeting = Meeting::where('creator_id', $user->id)->first();
        $data = $request->all();

        if (!empty($meeting)) {
            $time = $data['time'];

            $day = $data['day'];

            $explodeTime = explode('-', $time);
        
            if (!empty($explodeTime[0]) and !empty($explodeTime[1])) {
                $start_time = date("H:i", strtotime($explodeTime[0]));
                $end_time = date("H:i", strtotime($explodeTime[1]));

                if (strtotime($end_time) >= strtotime($start_time)) {
                    $checkTime = MeetingTime::where('meeting_id', $meeting->id)
                        ->where('day_label', $data)
                        ->where('time', $time)
                        ->first();

                    if (empty($checkTime)) {
                        MeetingTime::create([
                            'meeting_id' => $meeting->id,
                            'day_label' => $day,
                            'time' => $time,
                            'created_at' => time(),
                        ]);

                        return response()->json([
                            'code' => 200
                        ], 200);
                    }
                } else {
                    return response()->json([
                        'error' => 'contradiction'
                    ], 422);
                }
            }
        }

        return response()->json([], 422);
    }