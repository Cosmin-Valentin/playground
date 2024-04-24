<div class="agent-dashboard">
    <h6>Global Tickets</h6>
    <div class="row">
        <div class="global-ticket">
            <div class="card">
                <div class="card-body">
                    <a href="#">
                        <div>
                            <div class="primary-transparent global-ticket-icon">
                                <i class="fa fa-ticket"></i>
                            </div>
                            <div>
                                <p>All Tickets</p>
                                <h5>{{ $tickets->count() }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="global-ticket">
            <div class="card">
                <div class="card-body">
                    <a href="#">
                        <div>
                            <div class="secondary-transparent global-ticket-icon">
                                <i class="fa fa-ticket"></i>
                            </div>
                            <div>
                                <p>Recent Tickets</p>
                                <h5>{{ $tickets->count() }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="global-ticket">
            <div class="card">
                <div class="card-body">
                    <a href="#">
                        <div>
                            <div class="success-transparent global-ticket-icon">
                                <i class="fa fa-ticket"></i>
                            </div>
                            <div>
                                <p>Active Tickets</p>
                                <h5>{{ $tickets->filterByStatus('inProgress')->count() }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="global-ticket">
            <div class="card">
                <div class="card-body">
                    <a href="#">
                        <div>
                            <div class="danger-transparent global-ticket-icon">
                                <i class="fa fa-ticket"></i>
                            </div>
                            <div>
                                <p>Closed Tickets</p>
                                <h5>{{ $tickets->filterByStatus('closed')->count() }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        Recent Tickets
                    </h4>
                </div>
                <div class="card-body">
                    <div>
                        <div class="dashboard-table">
                            <div class="row">
                                <div>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th class="remove-column">
                                                    <input type="checkbox" id="checkAll" autocomplete="off">
                                                    <label for="checkAll"></label>
                                                </th>
                                                <th class="sorting">Ticket Details</th>
                                                <th class="sorting">User</th>
                                                <th class="sorting">Status</th>
                                                <th class="sorting">Assign To</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tickets as $ticket)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td class="remove-column-data">
                                                        <input type="checkbox" autocomplete="off">
                                                    </td>
                                                    <td class="ticket-details" data-ticket-id="{{ $ticket->id }}">
                                                        <div>
                                                            <a href="{{ route('uhelp.show', $ticket->id) }}">{{ $ticket->title }}</a>
                                                            <ul>
                                                                <li>{{ $ticket->custom_ticket_id }}</li>
                                                                <li>
                                                                    <i class="fa fa-calendar"></i>
                                                                    {{ $ticket->created_at->format('d-M-Y') }}
                                                                </li>
                                                                <li class="preference {{ $ticket->priority }}">{{ ucwords($ticket->priority) }}</li>
                                                                <li>
                                                                    <i class="fa fa-th-list"></i>
                                                                    {{ $ticket->category ? ucwords($ticket->category->name) : 'No category available' }}
                                                                </li>
                                                                <li>
                                                                    <i class="fa fa-clock-o"></i>
                                                                    {{ $ticket->created_at ? $ticket->created_at->diffForHumans() : 'No date available' }}
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                    <td>{{ $ticket->author->name }} {{ !$ticket->author->isAdmin ? '(Customer)' : '' }}</td>
                                                    <td>
                                                        {!! $ticket->status_html !!}
                                                    </td>
                                                    <td>
                                                        @include('uhelp.elements.btn-group')
                                                    </td>
                                                    <td>
                                                        <div class="actions">
                                                            <a href="{{ route('uhelp.show', $ticket->id) }}" class="view-ticket">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                            <div class="tooltip show">View Ticket</div>
                                                            <button class="delete-ticket">
                                                                <i class="fa fa-trash-o"></i>
                                                            </button>
                                                            <div class="tooltip delete">Delete Ticket</div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>