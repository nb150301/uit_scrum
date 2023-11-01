<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\LeavingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function login() {
        return view('login');
    }

    public function submitLogin(Request $request) {
        $email = $request->input('email');
        $password = $request->input('password');

        $employee = Employee::where('email', $email)->first();

        if (! isset($employee)) {
            return view('login', [
                'message' => 'Khong tim thay nhan vien trong he thong',
            ]);
        }

        $password_employee = $employee->password;

        if ($password !== $password_employee) {
            return view('login', [
                'message' => 'Sai mat khau',
            ]);
        }

        $employeeId = $employee->id;

        return redirect()->route('form', ['id' => $employeeId]);
    }

    public function getManagerList(Request $request) {
        if (! isset($request->id)) {
            return redirect()->route('login');
        }

        $manager = Employee::where('id', $request->id)->first();

        $forms = $manager->managerForms;
        return view('manager_request_list', compact('forms'));
    }

    public function postManagerForm(Request $request) {
        $formId = $request->form_id;

        $form = LeavingRequest::where('id', $formId)->first();

        $result = $request->type;

        if ($result == 'reject') {
            DB::table('request_form')->where('id', $formId)
                ->update([
                    'status' => $request->type,
                    'manager_reason' => $request->reason,
                ]);
            $forms = Employee::where('id', $form->manager_id)->first()->managerForms;

            return view('manager_request_list', compact('forms'));
        }

        $startDate = date_create($form->start_date);
        $endDate = date_create($form->end_date);
        $totalDays = date_diff($endDate, $startDate, true)->days;

        $employeeId = $form->sender_id;

        $employee = Employee::where('id', $employeeId)->first();

        $employeeRemainingDays = $employee->remaining_day;

        if ($employeeRemainingDays > $totalDays) {
            DB::table('employee')->where('id', $employee->id)
                ->update([
                    'remaining_day'=> $employeeRemainingDays - $totalDays,
                ]);

            DB::table('request_form')->where('id', $formId)
                ->update([
                    'status' => 'accepted',
                ]);

            $forms = Employee::where('id', $form->manager_id)->first()->managerForms;

            return view('manager_request_list', compact('forms'));
        }
    }

    public function getList(Request $request) {
        if (! isset($request->id)) {
            return redirect()->route('login');
        }

        $employee = Employee::where('id', $request->id)->first();

        $forms = $employee->forms;
        return view('request_list', compact('forms'));
    }

    public function getForm(Request $request) {
        if (! $request->id) {
            return redirect()->route('login');
        }
        $employee = Employee::where('id', $request->id)->first();

        return view('request_form', compact('employee'));
    }

    public function submitForm(Request $request) {
        $startDate = date_create($request->input('start_date'));
        $endDate = date_create($request->input('end_date'));
        $totalDays = date_diff($endDate, $startDate, true)->days;

        $employee = Employee::where('id', $request->input('employee_id'))->get()[0];

        $remainingDays = $employee->remaining_day;

        if ($remainingDays < $totalDays) {
            return view('request_form', [
                'message' => 'So ngay nghi nhieu hon so ngay con lai, vui long lien he truc tiep quan ly',
                'employeeId' => $request->input('employee_id'),
            ]);
        }

        DB::table('request_form')->insert([
            'sender_id' => $employee->id,
            'manager_id' => $employee->manager->id,
            'start_date' => date_create($request->input('start_date')),
            'end_date' => date_create($request->input('end_date')),
            'reason' => $request->input('reason'),
            'created_at' => date("Y-m-d"),
        ]);

        return view('request_form', [
            'message' => 'Da submit thanh cong, vui long theo doi ket qua cua form',
            'employee' => $employee,
        ]);
    }
}
