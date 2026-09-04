<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\Wedding;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AlumniController extends Controller
{
    public function index(): View
    {
        return view('admin.alumni.index', [
            'alumni' => Alumni::query()->orderBy('group')->orderBy('name')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'group' => ['nullable', 'string', 'max:255'],
        ]);

        Alumni::query()->create([
            'name' => $validated['name'],
            'group' => $validated['group'] ?? 'Alumni SI.81',
        ]);

        return redirect()->route('admin.alumni.index')->with('status', 'Alumni berhasil ditambahkan.');
    }

    public function edit(Alumni $alumni): View
    {
        return view('admin.alumni.edit', [
            'alumni' => $alumni,
        ]);
    }

    public function update(Request $request, Alumni $alumni): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'group' => ['nullable', 'string', 'max:255'],
        ]);

        $alumni->update($validated);

        return redirect()->route('admin.alumni.index')->with('status', 'Alumni berhasil diperbarui.');
    }

    public function destroy(Alumni $alumni): RedirectResponse
    {
        $alumni->delete();

        return redirect()->route('admin.alumni.index')->with('status', 'Alumni berhasil dihapus.');
    }

    public function shareWhatsApp(Alumni $alumni): View
    {
        $wedding = Wedding::firstOrFail();
        $guestName = $alumni->name;
        $coupleNames = strtoupper($wedding->coupleNames());
        $invitationUrl = 'https://surya-adee.ourwebsite.site/?to=' . urlencode($guestName);

        $message = "Kepada Yth.\n"
            . "Bapak/Ibu/Saudara/i\n"
            . "*{$guestName}*\n"
            . "_______\n\n"
            . "Assalamualaikum Warahmatullahi Wabarakatuh\n\n"
            . "Tanpa mengurangi rasa hormat, perkenankan kami mengundang Bapak/Ibu/Saudara/i, teman sekaligus sahabat, untuk menghadiri acara pernikahan kami.\n\n"
            . "Berikut link undangan kami, untuk info lengkap dari acara, bisa kunjungi :\n\n"
            . "{$invitationUrl}\n\n"
            . "Merupakan suatu kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan untuk hadir dan memberikan doa restu.\n\n"
            . "Wassalamualaikum Warahmatullahi Wabarakatuh🤍\n\n"
            . "Terima Kasih\n\n"
            . "Hormat kami,\n"
            . "*{$coupleNames}*\n"
            . '________';

        $whatsappUrl = 'https://wa.me/?text=' . urlencode($message);

        return view('admin.alumni.share', [
            'alumni' => $alumni,
            'message' => $message,
            'whatsappUrl' => $whatsappUrl,
            'invitationUrl' => $invitationUrl,
        ]);
    }

    public function shareAllWhatsApp(): View
    {
        $wedding = Wedding::firstOrFail();
        $alumni = Alumni::query()->orderBy('group')->orderBy('name')->get();
        $coupleNames = strtoupper($wedding->coupleNames());

        $messages = $alumni->map(function (Alumni $item) use ($coupleNames) {
            $guestName = $item->name;
            $invitationUrl = 'https://surya-ade.ourwebsite.site/?to=' . urlencode($guestName);

            $message = "Kepada Yth.\n"
                . "Bapak/Ibu/Saudara/i\n"
                . "*{$guestName}*\n"
                . "_______\n\n"
                . "Assalamualaikum Warahmatullahi Wabarakatuh\n\n"
                . "Tanpa mengurangi rasa hormat, perkenankan kami mengundang Bapak/Ibu/Saudara/i, teman sekaligus sahabat, untuk menghadiri acara pernikahan kami.\n\n"
                . "Berikut link undangan kami, untuk info lengkap dari acara, bisa kunjungi :\n\n"
                . "{$invitationUrl}\n\n"
                . "Merupakan suatu kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan untuk hadir dan memberikan doa restu.\n\n"
                . "Wassalamualaikum Warahmatullahi Wabarakatuh🤍\n\n"
                . "Terima Kasih\n\n"
                . "Hormat kami,\n"
                . "*{$coupleNames}*\n"
                . '________';

            return [
                'name' => $item->name,
                'group' => $item->group,
                'message' => $message,
                'whatsapp_url' => 'https://wa.me/?text=' . urlencode($message),
            ];
        });

        return view('admin.alumni.share-all', [
            'messages' => $messages,
        ]);
    }
}
