<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AttachmentController extends Controller
{
    public function update(Request $request, $id)
    {
        $request->validate([
            'attachment' => 'required|file|max:10240', // 10MB max
        ]);

        $attachment = Attachment::find($id);

        if (!$attachment) {
            return redirect()->back()->with('error', 'Attachment not found');
        }

        // Delete old file
        if ($attachment->attachment) {
            Storage::delete($attachment->attachment);
        }

        // Store new file
        $path = $request->file('attachment')->store('attachments', 'public');

        $attachment->update([
            'attachment' => $path,
        ]);

        return redirect()->back()->with('success', 'Attachment updated successfully');
    }

    public function destroy($id)
    {
        $attachment = Attachment::find($id);
        if ($attachment) {
            $attachment->delete();
            Storage::delete($attachment->attachment);
            return redirect()->back()->with('success', 'Attachment deleted successfully');
        }
        return redirect()->back()->with('error', 'Attachment not found');
    }
}
