<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

use App\Models\CarSubmission;
use Illuminate\Support\Facades\Storage;
use Illuminate\Mail\Mailables\Attachment;

class AdminSubmissionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $submission;

    /**
     * Create a new message instance.
     */
    public function __construct(CarSubmission $submission)
    {
        $this->submission = $submission;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Car Scrap Submission - ' . $this->submission->registration_number,
            replyTo: $this->submission->email ? [
                new \Illuminate\Mail\Mailables\Address($this->submission->email, $this->submission->full_name),
            ] : [],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.admin_submission',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $attachments = [];
        if ($this->submission->photos) {
            foreach ($this->submission->photos as $photoPath) {
                // Attach the file from storage
                $attachments[] = Attachment::fromStorageDisk('public', $photoPath);
            }
        }
        return $attachments;
    }
}
