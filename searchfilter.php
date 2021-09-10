private function filters($query, $request)
    {
        $from = $request->get('from', null);
        $to = $request->get('to', null);
        $search = $request->get('search', null);
        $sort = $request->get('sort', null);
        $organization_id = $request->get('organization_id', null);
        $group_id = $request->get('group_id', null);
        $disabled = $request->get('disabled', null);

        $query = fromAndToDateFilter($from, $to, $query, 'users.created_at');

        if (!empty($search)) {
            $query->where('users.full_name', 'like', "%$search%");
        }

        if (!empty($sort)) {
            switch ($sort) {
                case 'appointments_asc':
                    $query->orderBy('sales_count', 'asc');
                    break;
                case 'appointments_desc':
                    $query->orderBy('sales_count', 'desc');
                    break;
                case 'appointments_income_asc':
                    $query->orderBy('totalIncome', 'asc');
                    break;
                case 'appointments_income_desc':
                    $query->orderBy('totalIncome', 'desc');
                    break;
                case 'pending_appointments_asc':
                    $query->orderBy('pendingAppointments', 'asc');
                    break;
                case 'pending_appointments_desc':
                    $query->orderBy('pendingAppointments', 'desc');
                    break;
                case 'created_at_asc':
                    $query->orderBy('users.created_at', 'asc');
                    break;
                case 'created_at_desc':
                    $query->orderBy('users.created_at', 'desc');
                    break;
            }
        }

        if (!empty($organization_id)) {
            $query->where('organ_id', $organization_id);
        }

        if (!empty($group_id)) {
            $query->where('group_id', $group_id);
        }

        if (isset($disabled)) {
            $query->where('disabled', ($disabled == '1') ? 1 : 0);
        }

        return $query;
    }