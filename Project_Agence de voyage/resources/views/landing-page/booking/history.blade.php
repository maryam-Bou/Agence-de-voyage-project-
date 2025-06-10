                                            <td>{{ $booking->destination->name }}</td>
                                            <td>{{ $booking->total_guests }} Guests</td>
                                            <td>{{ format_currency($booking->total_price) }}</td>
                                            <td>
                                                @if ($booking->status == 'pending')
                                                    <span class="badge text-bg-warning">Pending</span>
                                                    <small class="d-block text-muted">Your booking is being reviewed</small>
                                                @elseif ($booking->status == 'approved')
                                                    <span class="badge text-bg-success">Approved</span>
                                                    <small class="d-block text-muted">Your booking has been confirmed</small>
                                                @else
                                                    <span class="badge text-bg-danger">Rejected</span>
                                                    <small class="d-block text-muted">Your booking request was not accepted</small>
                                                @endif
                                            </td>
                                            <td> 