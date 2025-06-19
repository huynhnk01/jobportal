<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Cho phép tất cả người dùng gửi form này
    }

    public function rules(): array
    {
        return [
            'title'            => 'required|string|max:255',
            'date_of_birth'    => 'required|date|before:today',
            'gender'           => 'required|in:male,female,other',
            'address'          => 'required|string|max:255',
            'phone'            => 'required|string|max:20|regex:/^(\+?\d{1,3}[- ]?)?\d{10}$/', // Optional phone number validation
            'experience_level' => 'required|in:fresher,junior,middle,senior,expert',
            'desired_salary'   => 'nullable|in:under-10m,10m-15m,15m-20m,20m-30m,30m-50m,over-50m,negotiable',
            'skills'           => 'required|string|max:1000',
            // 'education_level'  => 'required|in:high-school,college,bachelor,master,phd',
            'bio'              => 'nullable|string|max:2000',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required'         => 'Vui lòng nhập vị trí hiện tại.',
            'date_of_birth.required' => 'Vui lòng chọn ngày sinh.',
            'date_of_birth.before'   => 'Ngày sinh phải trước ngày hôm nay.',
            'gender.required'        => 'Vui lòng chọn giới tính.',
            'address.required'       => 'Vui lòng nhập địa chỉ.',
            'phone.required'         => 'Vui lòng nhập số điện thoại.',
            'phone.regex'            => 'Số điện thoại không hợp lệ. Vui lòng nhập đúng định dạng.',
            'experience_level.required' => 'Vui lòng chọn kinh nghiệm làm việc.',
            'skills.required'        => 'Vui lòng nhập kỹ năng chuyên môn.',
            // 'education_level.required' => 'Vui lòng chọn trình độ học vấn.',
        ];
    }
}
