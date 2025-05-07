<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MailController extends Controller
{
    /**
     * Обработка отправки контактной формы
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendMail(Request $request)
    {
        // Валидация полученных данных
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Если валидация не прошла, вернуть ошибки
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Получаем данные из запроса
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'subject' => $request->subject,
                'message' => $request->message,
            ];

            // Отправляем письмо
            Mail::to('aaleuetdinov@gmail.com')->send(new ContactFormMail($data));


            // Возвращаем успешный ответ
            return response()->json([
                'success' => true,
                'message' => 'Сообщение успешно отправлено'
            ]);

        } catch (\Exception $e) {
            // Логирование ошибки
            Log::error('Ошибка отправки контактной формы: ' . $e->getMessage());

            // Возвращаем ошибку
            return response()->json([
                'success' => false,
                'message' => 'Произошла ошибка при отправке сообщения'
            ], 500);
        }
    }
}
