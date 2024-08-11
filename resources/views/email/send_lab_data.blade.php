<!DOCTYPE html>
<html>

<head>
    <title>Lab Mail Notification</title>
</head>

<body>
    <h1>MEDICAL RECORD UPDATE FOR <span style="text-transform: uppercase;">{{ $user_name }}</span></h1>
    <h2>Hello, {{ $user_name }}</h2>
    <h2>Medical Record: {{ $recordName }}</h2>
    <ul>
        @foreach($types as $type)
            <li>
                <strong>Type Name:</strong> {{ $type['name'] }}
                <ul>
                    @foreach($type['details'] as $detail)
                        <li>
                            <strong>Description:</strong> {{ $detail['description'] }}
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>

    <br><br>
    <p>Best regards,</p>
    <p>Nwogu Michael</p>
</body>

</html>



