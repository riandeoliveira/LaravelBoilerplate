<?php

declare(strict_types=1);

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\{Content, Envelope};
use Illuminate\Queue\SerializesModels;

class ForgotPasswordMail extends Mailable {
  use Queueable, SerializesModels;

  protected string $email;
  protected string $name;
  protected string $token;

  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct(string $name, string $email, string $token) {
    $this->name = $name;
    $this->email = $email;
    $this->token = $token;
  }

  /**
   * Get the attachments for the message.
   *
   * @return array
   */
  public function attachments(): array {
    return [];
  }

  /**
   * Get the message content definition.
   *
   * @return \Illuminate\Mail\Mailables\Content
   */
  public function content(): Content {
    return new Content(view: 'emails.forgot-password', with: [
      'name' => $this->name,
      'email' => $this->email,
      'token' => $this->token,
    ]);
  }

  /**
   * Get the message envelope.
   *
   * @return \Illuminate\Mail\Mailables\Envelope
   */
  public function envelope(): Envelope {
    return new Envelope(from: 'todolistapi@email.com', subject: 'Forgot Password');
  }
}
