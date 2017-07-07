


                                        <table class="ex1">
                                        <thead>
                                        <tr>
                                                <th scope="col">IDX</th>
                                                <th scope="col">수업명</th>
                                                <th scope="col">학번</th>
                                                <th scope="col">확인 여부</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                                $stmt2=$dbh->prepare('select * from subject_anounce_check where pro_name =:pro_name');
						$pro_name="홍길동";
						$stmt2->bindParam(':pro_name',$pro_name);
						$stmt2->execute();

						$stmt2->setAttribute(PDO::FETCH_ASSOC);
						while($row=$stmt2->fetch()){
                                                echo "
                                                <tr>
                                                        <td class='date2'>".$row['idx']."</td>
                                                        <td class='date1'>".$row['class_name']."</td>
                                                        <td class='date1'>".$row['userid']."</td>
                                                        <td class='date1'>".$row['readcheck']."</td></tr>";
                                                }
                                        ?>
                                        </tbody>
                                        </table>


