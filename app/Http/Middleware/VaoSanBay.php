<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VaoSanBay
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // $ticketId = $request->get('ticket');
        // $ticket = Ticket::where('ticket', $ticketId, 'trangThaiSudung', '=', 'chuaSuDung')->first();
        // if (!$ticket) {
        //     return redirect('quay-ve');
        // }
        // Ticket::where('id', $ticket->id)->update([
        //     'trangThaiSudung' => 'dA SU DUNG',
        //     'ngaySuDung' => now()
        // ]);
        if ($request->get('ticket') !== 'X-123') {
            return redirect('quay-ve');
        }
        return $next($request);
    }
}
