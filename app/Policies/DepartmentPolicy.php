<?php

namespace App\Policies;

use App\Models\Department;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DepartmentPolicy
 {
    use HandlesAuthorization;

    // * Determine whether the user can view the department list.

    public function view(User $user)
    {
        return $user->hasAnyRole(['admin', 'department_viewer']); // Only admins and department_viewer can view
    }

//       * Determine whether the user can create a department.

    public function create(User $user)
    {
        return $user->hasRole('admin'); // Only admins can create departments
    }

    // * Determine whether the user can update the department.

    public function update(User $user, Department $department)
    {
        return $user->hasRole('admin') || $user->hasPermissionTo('edit_department'); // Admins or users with edit_department permission can update
    }

    // * Determine whether the user can delete the department.

    public function delete(User $user, Department $department)
    {
        return $user->hasRole('admin'); // Only admins can delete departments
    }
}
