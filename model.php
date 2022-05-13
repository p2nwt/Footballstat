<?php

Class Model{
    private $server = "localhost";
    private $username = "root";
    private $password= "";
    private $db= "Footballstat";
    private $connection= "";

    public function __construct(){
        try {
            $this->conn = new mysqli($this->server, $this->username, $this->password, $this->db);
        } catch (\Throwable $th) {
            echo "Connection error: " . $th->getMessage();
        }
    }
     // Fetch Season

    public function fetch_ss()
    {
        $data = [];
        $query = "SELECT DISTINCT Season
        FROM season 
        ORDER BY Season_ID ASC";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    // Fetch Competition

    public function fetch_com()
    {
        $data = [];
        $query = "SELECT DISTINCT Name AS Competition
        FROM competition
        ORDER BY ID ASC";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }

        return $data;
    }

    // Fetch Matchday

    public function fetch_md()
    {
        $data = [];
        $query = "SELECT DISTINCT Match_NO AS Matchday
        FROM match_no
        ORDER BY Match_NO_ID ASC";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }

        return $data;
    }

     // Fetch Match

        public function fetch_m()
        {
            $data = [];
            $query = "SELECT Match_Number AS Matchs
            FROM match_days
            ORDER BY Match_Number ASC";
            if ($sql = $this->conn->query($query)) {
                while ($row = mysqli_fetch_assoc($sql)) {
                    $data[] = $row;
                }
            }
    
            return $data;
        }

    // Fetch Club

    public function fetch_cl()
    {
        $data = [];
        $query = "SELECT DISTINCT Name AS Club
        FROM football_clubs
        ORDER BY ID ASC";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }

        return $data;
    }


    // Fetch Records
    public function fetch()
    {
        $data = [];
        $query = "SELECT
        match_no.Match_NO AS Matchday,
        schedule.Date AS Date,
        football_clubs.name AS Home,
        team2.name AS Away,
        schedule.Time AS Time,
        competition.Name AS Competition,
        stadium.Stadium_Name AS Stadium
    FROM
        schedule
        INNER JOIN match_no on schedule.Match_NO_ID = match_no.Match_NO_ID
        INNER JOIN football_clubs on schedule.Home_Club_ID = football_clubs.ID
        INNER JOIN football_clubs team2 on schedule.Away_Club_ID = team2.ID
        INNER JOIN competition on schedule.Competition_ID = competition.ID
        INNER JOIN stadium on schedule.Stadium_ID = stadium.Stadium_ID
    
    ORDER BY
        schedule.Match_NO_ID ASC,
        schedule.Date ASC;";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }

        return $data;
    }
    // Filter Md and CL

    public function fetch_filter($md, $cl)
    {
        $data = [];

        $query = "SELECT DISTINCT
        match_no.Match_NO AS Matchday,
        schedule.Date AS Date,
        football_clubs.name AS Home,
        team2.name AS Away,
        schedule.Time AS Time,
        competition.Name AS Competition,
        stadium.Stadium_Name AS Stadium
    FROM
    	season,
        schedule
        INNER JOIN match_no on schedule.Match_NO_ID = match_no.Match_NO_ID
        INNER JOIN football_clubs on schedule.Home_Club_ID = football_clubs.ID
        INNER JOIN football_clubs team2 on schedule.Away_Club_ID = team2.ID
        INNER JOIN competition on schedule.Competition_ID = competition.ID
        INNER JOIN stadium on schedule.Stadium_ID = stadium.Stadium_ID
     WHERE schedule.Match_NO_ID='$md' AND (football_clubs.name ='$cl' OR team2.Name ='$cl'); ";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }

        return $data;
    }

    // Filter Md

    public function fetch_md_filter($md)
    {
        $data = [];

        $query = "SELECT DISTINCT
        match_no.Match_NO AS Matchday,
        schedule.Date AS Date,
        football_clubs.name AS Home,
        team2.name AS Away,
        schedule.Time AS Time,
        competition.Name AS Competition,
        stadium.Stadium_Name AS Stadium
    FROM
    	season,
        schedule
        INNER JOIN match_no on schedule.Match_NO_ID = match_no.Match_NO_ID
        INNER JOIN football_clubs on schedule.Home_Club_ID = football_clubs.ID
        INNER JOIN football_clubs team2 on schedule.Away_Club_ID = team2.ID
        INNER JOIN competition on schedule.Competition_ID = competition.ID
        INNER JOIN stadium on schedule.Stadium_ID = stadium.Stadium_ID
     WHERE schedule.Match_NO_ID='$md'; ";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }

        return $data;
    }

    // Filter Cl

    public function fetch_cl_filter($cl)
    {
        $data = [];

        $query = "SELECT DISTINCT
        match_no.Match_NO AS Matchday,
        schedule.Date AS Date,
        football_clubs.name AS Home,
        team2.name AS Away,
        schedule.Time AS Time,
        competition.Name AS Competition,
        stadium.Stadium_Name AS Stadium
    FROM
    	season,
        schedule
        INNER JOIN match_no on schedule.Match_NO_ID = match_no.Match_NO_ID
        INNER JOIN football_clubs on schedule.Home_Club_ID = football_clubs.ID
        INNER JOIN football_clubs team2 on schedule.Away_Club_ID = team2.ID
        INNER JOIN competition on schedule.Competition_ID = competition.ID
        INNER JOIN stadium on schedule.Stadium_ID = stadium.Stadium_ID
     WHERE (football_clubs.name ='$cl' OR team2.Name ='$cl'); ";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }

        return $data;
    }
    public function fetch_result()
    {
        $data = [];
        $query = "SELECT 
        match_day.Match_NO_ID AS Matchday,
        schedule.Date AS Date,
        football_clubs.name AS Home,
        match_day.Score_Home_Club AS ScoreHome,
        match_day.Score_Away_Club AS ScoreAway,
        team2.name AS Away
    FROM
        match_day
        INNER JOIN schedule on match_day.Schedule_ID = schedule.ID
        INNER JOIN football_clubs on match_day.Home_Club_ID = football_clubs.ID
        INNER JOIN football_clubs team2 on match_day.Away_Club_ID = team2.ID
    ORDER BY
        match_day.Match_NO_ID ASC;";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }

        return $data;
    }

    public function insert_event(){

        if (isset($_POST['save'])) {
            if (isset($_POST['Schedule']) && isset($_POST['Team']) && isset($_POST['Player']) && isset($_POST['Event']) && isset($_POST['Minute'])) {
                if (!empty($_POST['Schedule']) && !empty($_POST['Team']) && !empty($_POST['Player']) && !empty($_POST['Event']) && !empty($_POST['Minute'])) {
                    
                    $Schedule = $_POST['Schedule'];
                    $Team = $_POST['Team'];
                    $Player=$_POST['Player'];
                    $Event = $_POST['Event'];
                    $Minute = $_POST['Minute'];

                    

                    $query = "INSERT INTO fixture_event (Schedule_ID,Team_ID,Player_ID,Event_ID,Minute) VALUES ('$Schedule','$Team','$Player','$Event','$Minute')";
                    if ($sql = $this->conn->query($query)) {
                        echo "<script>alert('records added successfully');</script>";
                        echo "<script>window.location.href = 'insert_event.php';</script>";
                    }else{
                        echo "<script>alert('failed');</script>";
                        echo "<script>window.location.href = 'insert_event.php';</script>";
                    }

                }else{
                    echo "<script>alert('empty');</script>";
                    echo "<script>window.location.href = 'insert_event.php';</script>";
                }
            }
        }
    }
    
    public function fetch_event(){

        $data = null;

			$query = "SELECT DISTINCT
            fixture_event.Fixture_Event_ID AS ID,
            schedule.Descrip AS Fixtures,
            football_clubs.name AS Team,
            player.Player_Name AS Player,
            event.Event_Name AS Event,
            fixture_event.Minute AS Minute
            FROM
            fixture_event
            INNER JOIN schedule on fixture_event.Schedule_ID = schedule.ID
            INNER JOIN football_clubs on fixture_event.Team_ID = football_clubs.ID
            INNER JOIN player on fixture_event.Player_ID = player.Player_ID
            INNER JOIN event on fixture_event.Event_ID = event.Event_ID
            ORDER BY
            fixture_event.Schedule_ID ASC,
            fixture_event.Minute DESC";
			if ($sql = $this->conn->query($query)) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$data[] = $row;
				}
			}
			return $data;
    }

    public function edit_event($id){

        $data = null;

        $query = "SELECT * FROM fixture_event WHERE Fixture_Event_ID = '$id'";
        if ($sql = $this->conn->query($query)) {
            while($row = $sql->fetch_assoc()){
                $data = $row;
            }
        }
        return $data;
    }

    public function update_event($data){

        $query = "UPDATE records SET Schedule_ID='$data[Schedule]', Team_ID='$data[Team]', Player_ID='$data[Player]', Event_ID='$data[Event],Minute='$data[Minute]' WHERE Fixture_Event_ID='$data[id] '";

        if ($sql = $this->conn->query($query)) {
            return true;
        }else{
            return false;
        }
    }

    public function insert_sub(){

        if (isset($_POST['save'])) {
            if (isset($_POST['Schedule']) && isset($_POST['Team']) && isset($_POST['Player_In']) && isset($_POST['Player_Out']) && isset($_POST['Minute'])) {
                if (!empty($_POST['Schedule']) && !empty($_POST['Team']) && !empty($_POST['Player_In']) && !empty($_POST['Player_Out']) && !empty($_POST['Minute'])) {
                    
                    $Schedule = $_POST['Schedule'];
                    $Team = $_POST['Team'];
                    $Player_In=$_POST['Player_In'];
                    $Player_Out=$_POST['Player_Out'];
                    $Minute = $_POST['Minute'];

                    

                    $query = "INSERT INTO fixture_sub (Schedule_ID,Team_ID,Playerin_ID,Playerout_ID,Minute) VALUES ('$Schedule','$Team','$Player_In','$Player_Out','$Minute')";
                    if ($sql = $this->conn->query($query)) {
                        echo "<script>alert('records added successfully');</script>";
                        echo "<script>window.location.href = 'insert_sub.php';</script>";
                    }else{
                        echo "<script>alert('failed');</script>";
                        echo "<script>window.location.href = 'insert_sub.php';</script>";
                    }

                }else{
                    echo "<script>alert('empty');</script>";
                    echo "<script>window.location.href = 'insert_sub.php';</script>";
                }
            }
        }
    }
}

