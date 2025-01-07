<?php

namespace App\Mail;

use App\Models\MedicalRecord;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DiagnosisNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $diagnosis;

    // البناء لتخزين التشخيص في الـ Mailable
    public function __construct(MedicalRecord $diagnosis)
    {
        $this->diagnosis = $diagnosis;
    }

    // تعريف طريقة build لتحديد مظهر البريد الإلكتروني
    public function build()
    {
        return $this->from($this->diagnosis->doctor->user->email, $this->diagnosis->doctor->user->name) // المرسل ديناميكيًا
                    ->view('emails.diagnosis')
                    ->with([
                        'patientName' => $this->diagnosis->patient->user->name,
                        'doctorName' => $this->diagnosis->doctor->user->name,
                        'diagnosis' => $this->diagnosis->diagnosis,
                        'treatment' => $this->diagnosis->treatment,
                        'prescription' => $this->diagnosis->prescription,
                    ]);
    }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Diagnosis Notification',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
           // from:'$this->diagnosis->doctor->user->email, $this->diagnosis->doctor->user->name',
            view: 'emails.diagnosis',
            with: [
                'patientName' => $this->diagnosis->patient->user->name,
                'doctorName' => $this->diagnosis->doctor->user->name,
                'diagnosis' => $this->diagnosis->diagnosis,
                'treatment' => $this->diagnosis->treatment,
                'prescription' => $this->diagnosis->prescription,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
