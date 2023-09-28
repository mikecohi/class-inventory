<?php

use PHPUnit\Framework\Attributes\DataProvider;

include_once '/xampp/htdocs/class/helper/FunctionController.php';
include_once '/xampp/htdocs/class/helper/QueryHandler.php';
include_once '/xampp/htdocs/class/helper/NotificationHandler.php';
class RoomTest extends \PHPUnit\Framework\TestCase
{
   protected function setUp(): void
   {
      Query::execute("DELETE FROM room WHERE id !='1'");
   }

   public static function allRoomParams(): array
   {
      return [
         [[], 0],
         [['D3_206', 'D7_504', 'D7_305', 'D3_202', 'D5_206', 'D9_204', 'D3_402', 'D3_403', 'D9_501', 'D3_401'], 10],
         [['D5_203', 'D7_302', 'D9_106', 'D3_506', 'D3_306', 'D9_303', 'D9_301', 'D9_205', 'D5_503', 'D7_103', 'D7_205', 'D9_406', 'D9_201', 'D9_506', 'D5_201', 'D9_206', 'D3_204', 'D7_305', 'D7_204', 'D3_305'], 20],
         [['D3_405', 'D5_501', 'D9_503', 'D7_202', 'D5_201', 'D5_203', 'D9_504', 'D9_303', 'D7_201', 'D3_404', 'D3_102', 'D7_506', 'D7_303', 'D9_106', 'D3_304', 'D7_304', 'D3_406', 'D9_206', 'D9_501', 'D3_106', 'D7_104', 'D9_205', 'D7_101', 'D3_306', 'D5_306', 'D9_201', 'D7_403', 'D7_505', 'D5_205', 'D9_305'], 30],
         [['D7_303', 'D9_201', 'D5_201', 'D5_202', 'D5_205', 'D9_302', 'D9_306', 'D7_204', 'D5_305', 'D3_301', 'D3_203', 'D3_404', 'D9_102', 'D5_402', 'D5_503', 'D9_303', 'D5_103', 'D5_404', 'D9_202', 'D3_506', 'D7_403', 'D7_504', 'D3_403', 'D3_101', 'D9_301', 'D7_202', 'D5_403', 'D3_305', 'D9_203', 'D9_505', 'D7_201', 'D5_101', 'D3_405', 'D3_406', 'D5_502', 'D7_503', 'D9_404', 'D7_101', 'D7_402', 'D9_502'], 40],
         [['D7_503', 'D3_303', 'D3_404', 'D9_506', 'D9_301', 'D7_203', 'D5_302', 'D5_405', 'D3_402', 'D9_402', 'D3_206', 'D7_303', 'D7_404', 'D5_301', 'D9_103', 'D7_505', 'D9_303', 'D7_101', 'D3_205', 'D7_104', 'D9_304', 'D9_405', 'D5_204', 'D7_103', 'D9_302', 'D9_101', 'D3_106', 'D5_103', 'D9_203', 'D9_401', 'D5_303', 'D3_504', 'D9_201', 'D7_504', 'D5_305', 'D5_506', 'D9_202', 'D7_106', 'D7_501', 'D7_502', 'D5_504', 'D5_402', 'D3_501', 'D9_404', 'D9_504', 'D7_405', 'D7_305', 'D5_401', 'D7_402', 'D3_506'], 50],
         [['D5_301', 'D7_406', 'D9_203', 'D3_401', 'D7_304', 'D9_102', 'D7_405', 'D9_106', 'D5_502', 'D3_302', 'D3_406', 'D5_506', 'D5_106', 'D3_106', 'D7_403', 'D3_501', 'D5_306', 'D5_305', 'D9_402', 'D9_301', 'D3_304', 'D5_405', 'D7_302', 'D7_201', 'D9_503', 'D3_205', 'D5_101', 'D3_202', 'D7_202', 'D9_205', 'D7_203', 'D7_505', 'D5_504', 'D5_103', 'D5_203', 'D7_504', 'D9_502', 'D3_105', 'D3_204', 'D5_205', 'D7_506', 'D7_503', 'D7_206', 'D3_101', 'D7_402', 'D3_203', 'D7_404', 'D5_206', 'D9_101', 'D9_405', 'D7_106', 'D9_104', 'D7_301', 'D7_103', 'D3_504', 'D7_501', 'D3_306', 'D5_304', 'D5_102', 'D7_502'], 60],
         [['D7_204', 'D9_501', 'D7_202', 'D3_406', 'D5_504', 'D7_502', 'D3_306', 'D5_101', 'D5_204', 'D5_306', 'D5_403', 'D5_102', 'D5_501', 'D3_103', 'D9_302', 'D5_206', 'D7_305', 'D3_201', 'D9_205', 'D9_401', 'D3_104', 'D3_504', 'D7_505', 'D7_303', 'D3_401', 'D5_304', 'D3_101', 'D3_403', 'D3_206', 'D5_406', 'D3_404', 'D7_404', 'D9_505', 'D5_505', 'D5_402', 'D9_204', 'D3_102', 'D7_304', 'D9_103', 'D9_101', 'D3_303', 'D3_405', 'D9_206', 'D9_202', 'D3_506', 'D3_105', 'D5_305', 'D5_301', 'D5_201', 'D3_203', 'D5_303', 'D3_302', 'D9_301', 'D7_406', 'D9_404', 'D5_105', 'D7_205', 'D9_405', 'D3_501', 'D3_304', 'D7_401', 'D9_105', 'D3_205', 'D7_103', 'D5_405', 'D9_506', 'D5_401', 'D5_502', 'D5_202', 'D7_101'], 70],
         [[
            'D7_202', 'D5_404', 'D3_206', 'D3_501', 'D3_306', 'D9_405', 'D7_501', 'D7_201', 'D7_102', 'D3_205', 'D5_206', 'D9_206', 'D3_406', 'D3_405', 'D3_202', 'D5_302', 'D5_205', 'D7_305', 'D9_102', 'D3_504', 'D7_105', 'D9_501', 'D9_205', 'D3_106', 'D3_302', 'D3_104', 'D5_102', 'D9_301', 'D5_306', 'D5_105', 'D5_202', 'D3_105', 'D9_104', 'D9_503', 'D7_306', 'D3_505', 'D5_204', 'D7_404', 'D3_101', 'D9_303', 'D7_205', 'D3_303', 'D5_403', 'D7_401', 'D9_504', 'D5_405', 'D3_102', 'D9_406', 'D3_203', 'D7_403', 'D9_306', 'D5_505', 'D9_202', 'D3_103', 'D3_401', 'D3_201', 'D7_303', 'D9_203', 'D5_502', 'D7_402', 'D9_304', 'D9_106', 'D7_101', 'D7_104', 'D7_206', 'D7_502', 'D9_404', 'D5_501', 'D7_302', 'D9_201', 'D9_103', 'D3_204', 'D3_402', 'D7_503', 'D3_304',
            'D7_406', 'D3_506', 'D9_401', 'D5_101', 'D7_504'
         ], 80],
         [[
            'D7_103', 'D3_405', 'D7_302', 'D7_501', 'D5_405', 'D3_403', 'D3_205', 'D9_403', 'D5_303', 'D9_101', 'D3_203', 'D9_106', 'D9_501', 'D5_105', 'D5_404', 'D5_501', 'D7_202', 'D9_406', 'D9_205', 'D9_105', 'D7_506', 'D3_402', 'D3_502', 'D7_306', 'D7_104', 'D9_201', 'D7_205', 'D9_405', 'D9_102', 'D7_206', 'D7_402', 'D9_104', 'D9_306', 'D5_304', 'D3_401', 'D9_505', 'D3_202', 'D9_206', 'D7_203', 'D9_304', 'D9_305', 'D9_401', 'D9_301', 'D3_103', 'D3_306', 'D3_301', 'D3_504', 'D7_106', 'D7_503', 'D3_201', 'D5_203', 'D5_205', 'D9_103', 'D5_202', 'D5_506', 'D5_406', 'D3_305', 'D3_406', 'D5_106', 'D7_204', 'D3_302', 'D5_102', 'D7_505', 'D9_504', 'D9_203', 'D9_202', 'D5_503', 'D7_405', 'D3_106', 'D3_505', 'D7_102', 'D3_503', 'D7_105', 'D7_502', 'D9_404',
            'D7_305', 'D9_502', 'D3_204', 'D9_204', 'D7_406', 'D3_506', 'D3_303', 'D5_204', 'D9_302', 'D7_504', 'D5_504', 'D5_206', 'D5_302', 'D9_503', 'D5_201'
         ], 90],
      ];
   }

   #[DataProvider('allRoomParams')]
   public function testAllRoom(array $rooms, int $expected)
   {
      for ($i = 0; $i < count($rooms); $i++) {
         $room = $rooms[$i];
         Query::execute("INSERT INTO room VALUES ('" . $room . "',150,1,'Phòng trống');");
      }
      $this->assertEquals($expected, RoomController::getAllRooms()->rowCount());
   }
   
   public static function findRoomParams(): array
   {
      return [
         [['D3_503', 'D3_405', 'D3_201', 'D3_501', 'D9_406', 'D3_103', 'D7_305', 'D3_202', 'D3_301', 'D7_201'], 'D5_101', false],
         [['D9_204', 'D3_303', 'D7_304', 'D3_106', 'D9_401', 'D9_206', 'D5_404', 'D9_205', 'D3_404', 'D9_304', 'D7_503', 'D3_305', 'D7_402', 'D9_403', 'D5_406', 'D3_403', 'D9_303', 'D7_405', 'D7_106', 'D5_403'], 'D5_303', false],
         [['D7_405', 'D7_501', 'D9_203', 'D3_201', 'D7_104', 'D3_503', 'D3_305', 'D5_405', 'D9_405', 'D5_305', 'D7_102', 'D7_201', 'D3_202', 'D9_504', 'D3_102', 'D9_204', 'D9_101', 'D3_302', 'D7_402', 'D9_403', 'D3_402', 'D7_205', 'D9_104', 'D3_205', 'D7_303', 'D5_306', 'D9_502', 'D9_506', 'D9_105', 'D7_503'], 'D7_104', true],
         [['D9_501', 'D7_205', 'D5_301', 'D7_202', 'D9_204', 'D9_201', 'D3_506', 'D5_206', 'D3_106', 'D7_102', 'D3_204', 'D3_402', 'D7_506', 'D7_206', 'D3_502', 'D7_103', 'D3_304', 'D3_302', 'D3_205', 'D5_204', 'D5_402', 'D5_201', 'D3_103', 'D9_206', 'D3_405', 'D5_404', 'D5_306', 'D7_405', 'D3_401', 'D5_105', 'D7_105', 'D9_404', 'D9_105', 'D5_302', 'D5_506', 'D9_306', 'D3_303', 'D7_504', 'D5_305', 'D9_205'], 'D3_502', true],
         [['D9_201', 'D9_105', 'D5_505', 'D5_206', 'D9_406', 'D5_503', 'D5_306', 'D5_506', 'D7_402', 'D3_305', 'D3_406', 'D3_202', 'D7_101', 'D7_205', 'D3_403', 'D9_305', 'D3_206', 'D7_103', 'D9_101', 'D5_106', 'D5_405', 'D7_404', 'D7_201', 'D9_203', 'D3_503', 'D5_203', 'D9_405', 'D5_303', 'D7_305', 'D7_206', 'D7_406', 'D3_204', 'D5_404', 'D7_104', 'D7_504', 'D9_304', 'D3_201', 'D9_301', 'D9_103', 'D9_306', 'D9_106', 'D7_106', 'D5_103', 'D3_405', 'D9_506', 'D7_405', 'D5_304', 'D9_401', 'D7_301', 'D9_206'], 'D7_102', false],
         [['D3_302', 'D3_404', 'D5_303', 'D3_504', 'D9_102', 'D9_204', 'D3_305', 'D9_501', 'D5_202', 'D7_405', 'D7_106', 'D3_103', 'D3_306', 'D3_406', 'D5_305', 'D7_101', 'D3_105', 'D9_302', 'D5_205', 'D3_204', 'D7_401', 'D7_502', 'D7_104', 'D9_304', 'D9_301', 'D5_501', 'D9_406', 'D5_503', 'D7_503', 'D3_102', 'D9_201', 'D3_206', 'D3_303', 'D3_505', 'D7_302', 'D7_105', 'D3_201', 'D3_501', 'D7_206', 'D3_402', 'D3_506', 'D5_505', 'D7_406', 'D7_501', 'D7_102', 'D9_104', 'D3_301', 'D3_101', 'D5_106', 'D9_306', 'D5_301', 'D9_502', 'D3_304', 'D9_101', 'D3_202', 'D3_502', 'D7_504', 'D3_104', 'D3_405', 'D9_206'], 'D7_406', true],
         [['D7_101', 'D5_305', 'D7_105', 'D5_502', 'D5_104', 'D9_203', 'D3_205', 'D5_303', 'D9_205', 'D5_306', 'D5_205', 'D9_402', 'D9_501', 'D7_305', 'D9_301', 'D5_503', 'D7_405', 'D3_502', 'D5_506', 'D3_506', 'D9_306', 'D3_503', 'D9_406', 'D5_302', 'D3_302', 'D9_201', 'D7_403', 'D7_302', 'D3_504', 'D3_404', 'D5_102', 'D7_206', 'D5_405', 'D3_101', 'D9_303', 'D3_206', 'D3_203', 'D9_404', 'D7_306', 'D7_304', 'D9_202', 'D3_501', 'D7_503', 'D7_102', 'D7_406', 'D3_103', 'D3_303', 'D5_204', 'D3_304', 'D9_401', 'D9_503', 'D5_504', 'D7_202', 'D3_505', 'D7_106', 'D3_204', 'D3_405', 'D7_205', 'D9_502', 'D9_204', 'D9_102', 'D3_106', 'D9_105', 'D5_401', 'D5_206', 'D9_504', 'D9_106', 'D9_405', 'D9_101', 'D5_103'], 'D9_206', false],
         [[
            'D5_301', 'D7_502', 'D5_504', 'D7_204', 'D9_205', 'D7_205', 'D9_105', 'D9_406', 'D9_305', 'D3_202', 'D7_501', 'D3_401', 'D7_206', 'D3_402', 'D9_106', 'D3_201', 'D7_302', 'D3_405', 'D9_206', 'D9_101', 'D5_305', 'D7_103', 'D9_102', 'D7_304', 'D7_404', 'D3_306', 'D5_103', 'D5_302', 'D5_505', 'D9_505', 'D3_505', 'D9_502', 'D7_506', 'D9_401', 'D3_303', 'D5_204', 'D7_505', 'D9_204', 'D3_103', 'D3_206', 'D7_102', 'D9_501', 'D3_102', 'D5_405', 'D3_302', 'D9_506', 'D7_105', 'D3_406', 'D3_504', 'D9_503', 'D3_304', 'D9_203', 'D5_401', 'D7_405', 'D5_403', 'D9_405', 'D3_404', 'D9_404', 'D5_502', 'D3_403', 'D3_205', 'D3_101', 'D5_203', 'D9_303', 'D7_406', 'D5_506', 'D7_203', 'D9_202', 'D5_304', 'D3_506', 'D9_402', 'D9_306', 'D3_502', 'D9_201', 'D7_305',
            'D3_501', 'D5_406', 'D7_202', 'D9_304', 'D3_106'
         ], 'D5_305', true],
         [[
            'D3_102', 'D3_201', 'D7_304', 'D3_505', 'D3_101', 'D7_505', 'D5_505', 'D3_504', 'D7_306', 'D7_204', 'D3_405', 'D7_101', 'D3_406', 'D5_502', 'D7_106', 'D3_301', 'D9_303', 'D9_101', 'D5_204', 'D5_201', 'D9_106', 'D9_402', 'D9_304', 'D9_206', 'D5_406', 'D3_203', 'D9_403', 'D3_103', 'D7_104', 'D9_302', 'D5_103', 'D9_205', 'D5_401', 'D3_104', 'D7_504', 'D5_302', 'D9_305', 'D9_202', 'D9_405', 'D7_206', 'D3_304', 'D5_306', 'D7_405', 'D7_205', 'D9_203', 'D5_503', 'D3_305', 'D5_405', 'D7_402', 'D5_203', 'D3_501', 'D5_105', 'D3_402', 'D9_503', 'D9_501', 'D9_102', 'D3_105', 'D5_506', 'D5_403', 'D9_104', 'D7_406', 'D3_303', 'D9_404', 'D5_304', 'D7_203', 'D5_206', 'D5_202', 'D5_101', 'D7_303', 'D7_501', 'D7_506', 'D3_205', 'D7_102', 'D7_401', 'D9_201',
            'D9_306', 'D7_302', 'D5_104', 'D9_105', 'D7_305', 'D7_502', 'D5_106', 'D7_103', 'D9_506', 'D3_503', 'D5_205', 'D3_506', 'D9_505', 'D3_401', 'D3_206'
         ], 'D3_504', true],
      ];
   }

   #[DataProvider('findRoomParams')]
   public function testFindRoom(array $rooms, string $needFindRoom, bool $expectedResult)
   {
      for ($i = 0; $i < count($rooms); $i++) {
         $room = $rooms[$i];
         Query::execute("INSERT INTO room VALUES ('" . $room . "',150,1,'Phòng trống');");
      }
      $this->assertEquals($expectedResult, RoomController::getRoomByID($needFindRoom)->rowCount() != 0);
   }
}
