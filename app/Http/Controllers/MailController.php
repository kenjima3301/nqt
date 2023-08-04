<?php

namespace App\Http\Controllers;

require '../vendor/autoload.php';
use \Mailjet\Resources;

class MailController extends Controller
{
  public function send($receiver,$subject,$template,$data) {
    $mj = new \Mailjet\Client(env('MAILERSEND_API_KEY', ''),env('MAILERSEND_SECRET_KEY', ''),true,['version' => 'v3.1']);
    $content = view($template, ['data' => $data])->render();
    $body = [
      'Messages' => [
        [
          'From' => [
            'Email' => "nguyen@luxcer.com",
            'Name' => "Ngọc Quyết Thắng"
          ],
          'To' => [
            [
              'Email' => $receiver,
              'Name' => ""
            ]
          ],
          'Subject' => $subject,
          'HTMLPart' => $content
        ]
      ]
    ];
    $mj->post(Resources::$Email, ['body' => $body]);

  }

}
