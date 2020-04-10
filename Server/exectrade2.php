<?php
header("Access-Control-Allow-Origin: *");
//ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
//http://localhost/server/dotrade.php?user=Deepanshu&mode=buy&symbol=nbev&qty=50&price=50&recur=1&doAt=2019-12-04
require "connection.php";
require "global.php";

function setbal($user,$add) {
    global $conn;
    $sql = "UPDATE tbluser SET Balance = Balance + $add WHERE  Username= '$user'";
    echo $sql;
    if ($conn->query($sql) === TRUE) {
        echo "   ->  Balance set".'<br/>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function getbal($user) {
    $qry = "select Balance from tbluser where Username = '$user'";
    global $conn;
    $result = $conn->query($qry);
    
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    return $row['Balance'];}
                 }
            return NULL;}




function setportfolio($user,$symbol, $qty, $price) {
    $qry = "select * from portfolio where Username = '$user' AND symbol = '$symbol';";
    global $conn;
    $result = $conn->query($qry);
            
    
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $sql = "UPDATE portfolio SET qty = qty + $qty , price = $price WHERE username = '$user' AND symbol = '$symbol'; ";
                    echo $sql;
                    if ($conn->query($sql) === TRUE) {  echo "   ->  Portfolio set".'<br/>'; } 
                    else { echo "Error: " . $sql . "<br>" . $conn->error; }
                    }
                 }
            else{   $sql = "INSERT INTO `portfolio` (`username`, `symbol`, `qty`, `price`) VALUES ('$user', '$symbol', $qty, $price)";
                    echo $sql;
                    if ($conn->query($sql) === TRUE) {  echo "   ->  Portfolio set".'<br/>'; } 
                    else { echo "Error: " . $sql . "<br>" . $conn->error; }

            }

            //Dirty Delete stocks less than 0
            $qry = " DELETE FROM portfolio where qty<0";
            //echo $qry.'<br/>';
            global $conn;
            $deletstock = $conn->query($qry);

}


function deq(){
    $qry = "select qid, Username, Symbol, Transaction, Qty, Price, doAt, recur from tradequeue  where doAt IS NULL or doAt < '".date("Y-m-d")."';";
    echo $qry.'<br/>';
    global $conn;
    $result = $conn->query($qry);
    
        if($result->num_rows > 0){  
                while($row = $result->fetch_assoc()){
                    $rowid = $row['qid'];
                    //buy
                    if(getbal($row['Username'])> $row['Price'] && $row['Transaction']== 'buy' )
                        {   echo $row['Username'];
                            echo 'Enough balance'.'   =>  ';
                            setbal($row['Username'], -1*$row['Price']);
                            //recur
                        if ($row['recur']>0)  {$row['doAt'] =date('Y-m-d', strtotime($row['doAt'] . ' +'.$row['recur'].' day'));
                            echo "=>".$row['doAt'];
                            $qry = " UPDATE tradequeue SET doAt = '$row[doAt]' where qid = '$rowid'";
                            echo $qry.'<br/>';
                            global $conn;
                            $addtodate = $conn->query($qry);

                        }
                            //no repeat - dequeue
                        else {
                            $qry = " DELETE FROM tradequeue where qid = '$rowid'";
                            echo $qry.'<br/>';
                            global $conn;
                            $deleteq = $conn->query($qry);
                        }

                        //add to portfolio on buy
                        setportfolio($row['Username'], $row['Symbol'], $row['Qty'],$row['Price']/$row['Qty']);


                        }



                    elseif ($row['Transaction']== 'sell')
                    {
                        setbal($row['Username'], +1*$row['Price']);
                        //recur sell
                        if ($row['recur']>0)  {$row['doAt'] =date('Y-m-d', strtotime($row['doAt'] . ' +'.$row['recur'].' day'));
                            echo "=>".$row['doAt'];
                            $qry = " UPDATE tradequeue SET doAt = '$row[doAt]' where qid = '$rowid'";
                            echo $qry.'<br/>';
                            global $conn;
                            $addtodate = $conn->query($qry);

                        }

                            //dequeue one time
                        else {
                            $qry = " DELETE FROM tradequeue where qid = '$rowid'";
                            echo $qry.'<br/>';
                            global $conn;
                            $deleteq = $conn->query($qry);
                        }

                         //remove from portfolio to buy
                         setportfolio($row['Username'], $row['Symbol'], -1*$row['Qty'],$row['Price']/$row['Qty']);
                    }









                     }
                 }




}

deq();







$conn->close();

?>