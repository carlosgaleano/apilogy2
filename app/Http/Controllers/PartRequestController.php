<?php

namespace App\Http\Controllers;

use App\Models\Rma;
use App\Models\BillToAddress;
use App\Models\ShipToAddress;
use App\Models\RequestVerifoneTSAAPI;
use App\Models\PRAttribute;
use App\Models\ExtendedWarrantyObj;
use App\Models\ServicePartsObj;
use App\Models\RPIDID;
use App\Models\User;
use App\Models\rmas_state;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response as HttpResponse;
use OpenApi\Annotations as OA;
use Ramsey\Uuid\Type\Integer;

/**
 * @OA\Info(title="API TSA VERIFONE", version="1.0.0")
 */

class PartRequestController extends Controller
{

    /**
 * @OA\Post(
 *     path="/api/prCreate",
 *     summary="Create RMA",
 *     description="Create RMA, para utilizar este método se debe estar autenticado, lo cual se hace con el método login que se encuentra al inicio de esta documentación",
 *     security={{"bearerAuth"=>{}}},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             @OA\Property(property="OrderCreateRequest", type="object",
 *                 @OA\Property(property="order", type="object",
 *                     @OA\Property(property="MessageId", type="string"),
 *                     @OA\Property(property="AppID", type="string"),
 *                     @OA\Property(property="BPPServiceEndDate", type="string"),
 *                     @OA\Property(property="BillToAddress", type="object",
 *                         @OA\Property(property="Country", type="string"),
 *                         @OA\Property(property="Address3", type="string"),
 *                         @OA\Property(property="City", type="string"),
 *                         @OA\Property(property="Address2", type="string"),
 *                         @OA\Property(property="Address1", type="string"),
 *                         @OA\Property(property="Contact", type="string"),
 *                         @OA\Property(property="PostalCode", type="string"),
 *                         @OA\Property(property="SiteName", type="string"),
 *                         @OA\Property(property="SiteID", type="string"),
 *                         @OA\Property(property="State", type="string"),
 *                         @OA\Property(property="PhoneNo", type="string")
 *                     ),
 *                     @OA\Property(property="BillToSiteOperatingUnit", type="string"),
 *                     @OA\Property(property="BillingAccountNumber", type="string"),
 *                     @OA\Property(property="CancellationAuthorizationNumber", type="string"),
 *                     @OA\Property(property="CancellationDate", type="string"),
 *                     @OA\Property(property="Carrier", type="string"),
 *                     @OA\Property(property="CaseId", type="string"),
 *                     @OA\Property(property="Condition", type="string"),
 *                     @OA\Property(property="ContractID", type="string"),
 *                     @OA\Property(property="CustomerItemNumber", type="string"),
 *                     @OA\Property(property="ExtendedWarrantyObj", type="object",
 *                         @OA\Property(property="PartDescription", type="string"),
 *                         @OA\Property(property="PartNumber", type="string"),
 *                         @OA\Property(property="ProductCode", type="string"),
 *                         @OA\Property(property="WarrantyEndDate", type="string")
 *                     ),
 *                     @OA\Property(property="ExternalOrderNumber", type="string"),
 *                     @OA\Property(property="HeaderNotes", type="string"),
 *                     @OA\Property(property="IncomingQTY", type="string"),
 *                     @OA\Property(property="IncomingUnitPartNumber", type="string"),
 *                     @OA\Property(property="IncomingUnitPartNumberDescription", type="string"),
 *                     @OA\Property(property="IncomingUnitSerialNumber", type="string"),
 *                     @OA\Property(property="InternalDepartmentNumber", type="string"),
 *                     @OA\Property(property="Looper", type="string"),
 *                     @OA\Property(property="MRACode", type="string"),
 *                     @OA\Property(property="Mkey", type="string"),
 *                     @OA\Property(property="MoreInfoNotes", type="string"),
 *                     @OA\Property(property="MsgId", type="string"),
 *                     @OA\Property(property="OutgoingQTY", type="string"),
 *                     @OA\Property(property="OutgoingUnitPartNumber", type="string"),
 *                     @OA\Property(property="OutgoingUnitPartNumberDescription", type="string"),
 *                     @OA\Property(property="PONumber", type="string"),
 *                     @OA\Property(property="PRCreationDate", type="string"),
 *                     @OA\Property(property="PRDetailNotes", type="string"),
 *                     @OA\Property(property="PRStatus", type="string"),
 *                     @OA\Property(property="PartRequestDetailNumber", type="string"),
 *                     @OA\Property(property="PartRequestHeaderID", type="string"),
 *                     @OA\Property(property="Priority", type="string"),
 *                     @OA\Property(property="ProblemFound", type="string"),
 *                     @OA\Property(property="ProductCode", type="string"),
 *                     @OA\Property(property="ProductCodeDescription", type="string"),
 *                     @OA\Property(property="ReRepairRule", type="string"),
 *                     @OA\Property(property="RepairNotes", type="string"),
 *                     @OA\Property(property="RepairStatus", type="string"),
 *                     @OA\Property(property="ReportedProblem", type="string"),
 *                     @OA\Property(property="RequestType", type="string"),
 *                     @OA\Property(property="ServiceCenter", type="string"),
 *                     @OA\Property(property="ServicePartsObj", type="object",
 *                         @OA\Property(property="ServiceEndDate", type="string"),
 *                         @OA\Property(property="ServicePartDescription", type="string"),
 *                         @OA\Property(property="ServicePartNumber", type="string"),
 *                         @OA\Property(property="ServiceProductCode", type="string")
 *                     ),
 *                     @OA\Property(property="ShipToAddress", type="object",
 *                         @OA\Property(property="Country", type="string"),
 *                         @OA\Property(property="Address3", type="string"),
 *                         @OA\Property(property="City", type="string"),
 *                         @OA\Property(property="Address2", type="string"),
 *                         @OA\Property(property="Address1", type="string"),
 *                         @OA\Property(property="Contact", type="string"),
 *                         @OA\Property(property="PostalCode", type="string"),
 *                         @OA\Property(property="SiteName", type="string"),
 *                         @OA\Property(property="SiteID", type="string"),
 *                         @OA\Property(property="State", type="string"),
 *                         @OA\Property(property="PhoneNo", type="string")
 *                     ),
 *                     @OA\Property(property="ShipToCow", type="string"),
 *                     @OA\Property(property="ShipVia", type="string"),
 *                     @OA\Property(property="Summary", type="string"),
 *                     @OA\Property(property="SupplyCow", type="string"),
 *                     @OA\Property(property="TID", type="string"),
 *                     @OA\Property(property="UnitWarrantyType", type="string"),
 *                     @OA\Property(property="PRAttributes", type="array",
 *                         @OA\Items(type="object",
 *                             @OA\Property(property="Name", type="string"),
 *                             @OA\Property(property="Value", type="string")
 *                         )
 *                     ),
 *                     @OA\Property(property="RPIDs", type="array",
 *                         @OA\Items(type="object",
 *                             @OA\Property(property="RPIDDescription", type="string"),
 *                             @OA\Property(property="RPIDID", type="string"),
 *                             @OA\Property(property="RPIDType", type="string"),
 *                             @OA\Property(property="RPIDWarrantyType", type="string")
 *                         )
 *                     )
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful response",
 *         @OA\JsonContent(
 *             @OA\Property(property="status", type="string"),
 *             @OA\Property(property="messageId", type="integer"),
 *             @OA\Property(property="message", type="string")
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized"
 *     )
 * )
 */


    public function prCreate(Request $request)
    {

        //var_dump($request['OrderCreateRequest']);
        // ddd($request);

        if (!Auth::check()) {
            return response()->json(['message' => 'No autorizado'], 401);
        }


        try {

           $idSaveRequest= $this->saveRequest($request, 'prCreate');

            $validated = $request->validate([
                'OrderCreateRequest.order.MessageId' => 'required|string',
                'OrderCreateRequest.order.BillToAddress.Country' => 'required|string',
                'OrderCreateRequest.order.BillToAddress.City' => 'required|string',
                'OrderCreateRequest.order.ExternalOrderNumber' => 'required|string',
                'OrderCreateRequest.order.PONumber' => 'required|string',

                //'PONumber' => 'required|string',
                // Agrega las validaciones necesarias para otros campos
            ]);


            $order = $request->input('OrderCreateRequest.order');


         /*    return response()->json([
                'status' => 'SUCCESS',
                'messageId' => 1,
                'message' => $order['PRAttributes'],
                'data' => $order,
                'campo' => $request->input('OrderCreateRequest.order.MessageId'),
            ]); */

            // dd($order['PRAttributes']);




            if (!empty($order['BillToAddress'])) {
                $billToAddressData = $order['BillToAddress'];

                //var_dump($billToAddressData);

                // Crear o buscar el registro de BillToAddress
                $billToAddress = BillToAddress::create([
                    'country' => $billToAddressData['Country'],
                    'address3' => $billToAddressData['Address3'],
                    'city' => $billToAddressData['City'],
                    'address2' => $billToAddressData['Address2'],
                    'address1' => $billToAddressData['Address1'],
                    'contact' => $billToAddressData['Contact'],
                    'postalcode' => $billToAddressData['PostalCode'],
                    'sitename' => $billToAddressData['SiteName'],
                    'siteid' => $billToAddressData['SiteID'],
                    'state' => $billToAddressData['State'],
                    'phoneno' => $billToAddressData['PhoneNo'],
                ]);
            } else {
                $billToAddress = null;  // Si no hay datos, no se crea el registro
            }

            if (!empty($order['ShipToAddress'])) {
            $shipToAddress= ShipToAddress::create([
                'country' => $order['ShipToAddress']['Country'] ?? '',
                'address1' => $order['ShipToAddress']['Address1'] ?? '',
                'address2' => $order['ShipToAddress']['Address2'] ?? '',
                'address3' => $order['ShipToAddress']['Address3'] ?? '',
                'city' => $order['ShipToAddress']['City'] ?? '',
                'state' => $order['ShipToAddress']['State'] ?? '',
                'postalcode' => $order['ShipToAddress']['PostalCode'] ?? '',
                'sitename' => $order['ShipToAddress']['SiteName'] ?? '',
                'siteid' => $order['ShipToAddress']['SiteID'] ?? '',
                'contact' => $order['ShipToAddress']['Contact'] ?? '',
                'phoneno' => $order['ShipToAddress']['PhoneNo'] ?? '',
            ]);

        } else {

            $shipToAddress = null;  // Si no hay datos, no se crea el registro
        }


        if(!empty($order['ExtendedWarrantyObj'])){

            $ExtendedWarrantyObj= ExtendedWarrantyObj::create([
                'PartDescription' => $order['ExtendedWarrantyObj']['PartDescription'] ?? '',
                'PartNumber' => $order['ExtendedWarrantyObj']['PartNumber'] ?? '',
                'ProductCode' => $order['ExtendedWarrantyObj']['ProductCode'] ?? '',
                'WarrantyEndDate' => $order['ExtendedWarrantyObj']['WarrantyEndDate'] ?? '',
            ]);



        }else{


            $ExtendedWarrantyObj = null;  // Si no hay datos, no se crea el registro
        }


        if(!empty($order['ServicePartsObj'])){

            $ServicePartsObj= ServicePartsObj::create([
                'ServiceEndDate' => $order['ServicePartsObj']['ServiceEndDate'] ?? '',
                'ServicePartDescription' => $order['ServicePartsObj']['ServicePartDescription'] ?? '',
                'ServicePartNumber' => $order['ServicePartsObj']['ServicePartNumber'] ?? '',
                'ServiceProductCode' => $order['ServicePartsObj']['ServiceProductCode'] ?? '',
            ]);

        }else{

            $ServicePartsObj = null;  // Si no hay datos, no se crea el registro
        }


           $incomingQTY=$order['IncomingQTY'] ?? null;
           $outgoingQTY=$order['outgoingQTY'] ?? null;


            $rma = RMA::create([
                'PONumber' => $order['PONumber'] ?? '',
                'MessageId' => $order['MessageId'] ?? '',
                'outgoingUnitPartNumber' => $order['OutgoingUnitPartNumber'] ?? '',
                'looper' => $order['Looper'] ?? '',
                'reRepairRule' => $order['ReRepairRule'] ?? '',
                'customerItemNumber' => $order['CustomerItemNumber'] ?? '',
                'outgoingUnitPartNumberDescription' => $order['OutgoingUnitPartNumberDescription'] ?? '',
                'PRDetailNotes' => $order['RepairNotes'] ?? '',
                //'billToAddress'=> $order['billToAddress']??'',
                'shipVia' => $order['ShipVia'] ?? '',
                'messageType' => $order['MessageType'] ?? '',
                'headerNotes' => $order['HeaderNotes'] ?? '',
                'incomingQTY' =>  intval($incomingQTY),
                'contractID' => $order['ContractID'] ?? '',
                'PRStatus' => $order['PRStatus'] ?? '',
                'PRCreationDate' => $order['PRCreationDate'] ?? '',
                'serviceCenter' => $order['ServiceCenter'] ?? '',
                'incomingUnitPartNumberDescription' => $order['IncomingUnitPartNumberDescription'] ?? '',
                'partRequestHeaderID' => $order['PartRequestHeaderID'] ?? '',
                'summary' => $order['Summary'] ?? '',
                'mkey' => $order['Mkey'] ?? '',
                'incomingUnitSerialNumber' => $order['IncomingUnitSerialNumber'] ?? '',
                'reportedProblem' => $order['ReportedProblem'] ?? '',
                'requestType' => $order['RequestType'] ?? '',
                'repairStatus' => $order['RepairStatus'] ?? '',
                'billingAccountNumber' => $order['BillingAccountNumber'] ?? '',
                'MRACode' => $order['MRACode'] ?? '',
                'incomingUnitPartNumber' => $order['IncomingUnitPartNumber'] ?? '',
                'messageId' => $order['MessageId'] ?? '',
                'productCodeDescription' => $order['ProductCodeDescription'] ?? '',
                'priority' => $order['Priority'] ?? '',
                'shipToCow' => $order['ShipToCow'] ?? '',
                'TID' => $order['TID'] ?? '',
                'carrier' => $order['carrier'] ?? '',
                'productCode' => $order['ProductCode'] ?? '',
                'internalDepartmentNumber' => $order['InternalDepartmentNumber'] ?? '',
                'partRequestDetailNumber' => $order['PartRequestDetailNumber'] ?? '',
                'supplyCow' => $order['SupplyCow'] ?? '',
                'appID' => $order['AppID'] ?? '',
                'billToSiteOperatingUnit' => $order['BillToSiteOperatingUnit'] ?? '',
                'unitWarrantyType' => $order['UnitWarrantyType'] ?? '',
                'repairNotes' => $order['RepairNotes'] ?? '',
                'outgoingQTY' => $outgoingQTY ?? null,
                'cancellationAuthorizationNumber' => $order['CancellationAuthorizationNumber'] ?? '',
                'problemFound' => $order['ProblemFound'] ?? '',
                'cancellationDate' => $order['CancellationDate'] ?? null,
                'billToAddress_id' => $billToAddress ? $billToAddress->id : null,  // Si existe BillToAddress, se guarda su ID
                'shipToAddress_id' => $shipToAddress  ?  $shipToAddress->id : null,
                'extended_warranty_obj_id' => $ExtendedWarrantyObj ? $ExtendedWarrantyObj->id : null,
                'service_parts_obj_id'=> $ServicePartsObj ? $ServicePartsObj->id : null,
                // Otros campos que necesites
            ]);





            if(!empty($order['PRAttributes'] )){

                foreach ($order['PRAttributes'] as $attribute) {
                    PRAttribute::create([
                        'Name' => $attribute['Name'],
                        'Value' => $attribute['Value'],
                        'rmas_id'=>$rma->id,
                    ]);
                }


            }



            if(!empty($order['RPIDs'])){

                foreach ($order['RPIDs'] as $rpid) {
                    RPIDID::create([
                        'RPIDDescription' => $rpid['RPIDDescription'],
                        'RPIDID' => $rpid['RPIDID'],
                        'RPIDType' => $rpid['RPIDType'],
                        'RPIDWarrantyType' => $rpid['RPIDWarrantyType'],
                        'rmas_id' => $rma->id,
                    ]);
                }

            }

            $state= rmas_state::create([
                'rma_id'=>$rma->id,
                'state'=>'created',
                'id_state'=>1,
            ]);
           // dd($order['PRAttributes']);

            // Verificar que se haya guardado correctamente el ID

            $return_old= response()->json([
                'status' => 'SUCCESS',
                'messageId' => $rma->id,
                'message' => 'RMA created successfully',
                'data1'=>$order['OutgoingUnitPartNumber'],
                //'data' => $order,
               // 'campo' => $request->input('OrderCreateRequest.order.MessageId'),
              // 'campo2'=> $rma->extended_warranty_obj_id,
               'campo3'=>$order['RPIDs'],
            ]);

            $return= response()->json([
                'createCaseResponse'=>[
                    'return'=>[
                        "siteId"=> "",
                        "message"=> "RMA created successfully",
                        "merchantId"=> "",
                        "customerSORef"=> "",
                        "code"=> "SUCCESS",
                        "caseId"=> $rma->id
                    ]

                ]
            ]);
        } catch (\Exception $e) {
            $return_old= response()->json([
                'status' => 'ERROR',
                'message' => $e->getMessage(),
            ], HttpResponse::HTTP_INTERNAL_SERVER_ERROR);

            $return= response()->json([
                'createCaseResponse'=>[
                    'return'=>[
                        "siteId"=> "",
                        "message"=> $e->getMessage(),
                        "merchantId"=> "",
                        "customerSORef"=> "",
                        "code"=> "FAILED",
                        "caseId"=> 0
                    ]

                ]
            ]);

        }

        $this->updateSaveRequest($idSaveRequest, $return);

        return $return;
    }

   /**
 * @OA\Post(
 *     path="/api/prUpdate/{id}",
 *     summary="Update RMA",
 *     description="Actualizar RMA. Para utilizar este método se debe estar autenticado, lo cual se hace con el método login que se encuentra al inicio de esta documentación.",
 *     security={{"bearerAuth"=>{}}},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             @OA\Property(property="OrderUpdateRequest", type="object",
 *                 @OA\Property(property="order", type="object",
 *                     @OA\Property(property="MessageId", type="string"),
 *                     @OA\Property(property="AppID", type="string"),
 *                     @OA\Property(property="BPPServiceEndDate", type="string"),
 *                     @OA\Property(property="BillToAddress", type="object",
 *                         @OA\Property(property="Country", type="string"),
 *                         @OA\Property(property="Address3", type="string"),
 *                         @OA\Property(property="City", type="string"),
 *                         @OA\Property(property="Address2", type="string"),
 *                         @OA\Property(property="Address1", type="string"),
 *                         @OA\Property(property="Contact", type="string"),
 *                         @OA\Property(property="PostalCode", type="string"),
 *                         @OA\Property(property="SiteName", type="string"),
 *                         @OA\Property(property="SiteID", type="string"),
 *                         @OA\Property(property="State", type="string"),
 *                         @OA\Property(property="PhoneNo", type="string")
 *                     ),
 *                     @OA\Property(property="BillToSiteOperatingUnit", type="string"),
 *                     @OA\Property(property="BillingAccountNumber", type="string"),
 *                     @OA\Property(property="CancellationAuthorizationNumber", type="string"),
 *                     @OA\Property(property="CancellationDate", type="string"),
 *                     @OA\Property(property="Carrier", type="string"),
 *                     @OA\Property(property="CaseId", type="string"),
 *                     @OA\Property(property="Condition", type="string"),
 *                     @OA\Property(property="ContractID", type="string"),
 *                     @OA\Property(property="CustomerItemNumber", type="string"),
 *                     @OA\Property(property="ExtendedWarrantyObj", type="object",
 *                         @OA\Property(property="PartDescription", type="string"),
 *                         @OA\Property(property="PartNumber", type="string"),
 *                         @OA\Property(property="ProductCode", type="string"),
 *                         @OA\Property(property="WarrantyEndDate", type="string")
 *                     ),
 *                     @OA\Property(property="ExternalOrderNumber", type="string"),
 *                     @OA\Property(property="HeaderNotes", type="string"),
 *                     @OA\Property(property="IncomingQTY", type="string"),
 *                     @OA\Property(property="IncomingUnitPartNumber", type="string"),
 *                     @OA\Property(property="IncomingUnitPartNumberDescription", type="string"),
 *                     @OA\Property(property="IncomingUnitSerialNumber", type="string"),
 *                     @OA\Property(property="InternalDepartmentNumber", type="string"),
 *                     @OA\Property(property="Looper", type="string"),
 *                     @OA\Property(property="MRACode", type="string"),
 *                     @OA\Property(property="Mkey", type="string"),
 *                     @OA\Property(property="MoreInfoNotes", type="string"),
 *                     @OA\Property(property="MsgId", type="string"),
 *                     @OA\Property(property="OutgoingQTY", type="string"),
 *                     @OA\Property(property="OutgoingUnitPartNumber", type="string"),
 *                     @OA\Property(property="OutgoingUnitPartNumberDescription", type="string"),
 *                     @OA\Property(property="PONumber", type="string"),
 *                     @OA\Property(property="PRCreationDate", type="string"),
 *                     @OA\Property(property="PRDetailNotes", type="string"),
 *                     @OA\Property(property="PRStatus", type="string"),
 *                     @OA\Property(property="PartRequestDetailNumber", type="string"),
 *                     @OA\Property(property="PartRequestHeaderID", type="string"),
 *                     @OA\Property(property="Priority", type="string"),
 *                     @OA\Property(property="ProblemFound", type="string"),
 *                     @OA\Property(property="ProductCode", type="string"),
 *                     @OA\Property(property="ProductCodeDescription", type="string"),
 *                     @OA\Property(property="ReRepairRule", type="string"),
 *                     @OA\Property(property="RepairNotes", type="string"),
 *                     @OA\Property(property="RepairStatus", type="string"),
 *                     @OA\Property(property="ReportedProblem", type="string"),
 *                     @OA\Property(property="RequestType", type="string"),
 *                     @OA\Property(property="ServiceCenter", type="string"),
 *                     @OA\Property(property="ServicePartsObj", type="object",
 *                         @OA\Property(property="ServiceEndDate", type="string"),
 *                         @OA\Property(property="ServicePartDescription", type="string"),
 *                         @OA\Property(property="ServicePartNumber", type="string"),
 *                         @OA\Property(property="ServiceProductCode", type="string")
 *                     ),
 *                     @OA\Property(property="ShipToAddress", type="object",
 *                         @OA\Property(property="Country", type="string"),
 *                         @OA\Property(property="Address3", type="string"),
 *                         @OA\Property(property="City", type="string"),
 *                         @OA\Property(property="Address2", type="string"),
 *                         @OA\Property(property="Address1", type="string"),
 *                         @OA\Property(property="Contact", type="string"),
 *                         @OA\Property(property="PostalCode", type="string"),
 *                         @OA\Property(property="SiteName", type="string"),
 *                         @OA\Property(property="SiteID", type="string"),
 *                         @OA\Property(property="State", type="string"),
 *                         @OA\Property(property="PhoneNo", type="string")
 *                     ),
 *                     @OA\Property(property="ShipToCow", type="string"),
 *                     @OA\Property(property="ShipVia", type="string"),
 *                     @OA\Property(property="Summary", type="string"),
 *                     @OA\Property(property="SupplyCow", type="string"),
 *                     @OA\Property(property="TID", type="string"),
 *                     @OA\Property(property="UnitWarrantyType", type="string"),
 *                     @OA\Property(property="PRAttributes", type="array",
 *                         @OA\Items(
 *                             @OA\Property(property="Name", type="string"),
 *                             @OA\Property(property="Value", type="string")
 *                         )
 *                     ),
 *                     @OA\Property(property="RPIDs", type="array",
 *                         @OA\Items(
 *                             @OA\Property(property="RPIDDescription", type="string"),
 *                             @OA\Property(property="RPIDID", type="string"),
 *                             @OA\Property(property="RPIDType", type="string"),
 *                             @OA\Property(property="RPIDWarrantyType", type="string")
 *                         )
 *                     )
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful response",
 *         @OA\JsonContent(
 *             @OA\Property(property="status", type="string"),
 *             @OA\Property(property="messageId", type="integer"),
 *             @OA\Property(property="message", type="string")
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized"
 *     )
 * )
 */
    public function prUpdate(Request $request, $id)
    {
        $validated = $request->validate([
            'PONumber' => 'required|string',
            // Agrega las validaciones necesarias para otros campos
        ]);

        try {
            $rma = RMA::findOrFail($id);
            $rma->update($validated);

            return response()->json([
                'status' => 'SUCCESS',
                'messageId' => $rma->id,
                'message' => 'RMA updated successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'ERROR',
                'message' => $e->getMessage(),
            ], HttpResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
/**
 * @OA\Post(
 *     path="/api/prCancel/{id}",
 *     summary="Cancel RMA",
 *     description="Cancelar RMA. Para utilizar este método se debe estar autenticado, lo cual se hace con el método login que se encuentra al inicio de esta documentación.",
 *     security={{"bearerAuth"=>{}}},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             @OA\Property(property="OrderCancelRequest", type="object",
 *                 @OA\Property(property="order", type="object",
 *                     @OA\Property(property="MessageId", type="string"),
 *                     @OA\Property(property="AppID", type="string"),
 *                     @OA\Property(property="BPPServiceEndDate", type="string"),
 *                     @OA\Property(property="BillToAddress", type="object",
 *                         @OA\Property(property="Country", type="string"),
 *                         @OA\Property(property="Address3", type="string"),
 *                         @OA\Property(property="City", type="string"),
 *                         @OA\Property(property="Address2", type="string"),
 *                         @OA\Property(property="Address1", type="string"),
 *                         @OA\Property(property="Contact", type="string"),
 *                         @OA\Property(property="PostalCode", type="string"),
 *                         @OA\Property(property="SiteName", type="string"),
 *                         @OA\Property(property="SiteID", type="string"),
 *                         @OA\Property(property="State", type="string"),
 *                         @OA\Property(property="PhoneNo", type="string")
 *                     ),
 *                     @OA\Property(property="BillToSiteOperatingUnit", type="string"),
 *                     @OA\Property(property="BillingAccountNumber", type="string"),
 *                     @OA\Property(property="CancellationAuthorizationNumber", type="string"),
 *                     @OA\Property(property="CancellationDate", type="string"),
 *                     @OA\Property(property="Carrier", type="string"),
 *                     @OA\Property(property="CaseId", type="string"),
 *                     @OA\Property(property="Condition", type="string"),
 *                     @OA\Property(property="ContractID", type="string"),
 *                     @OA\Property(property="CustomerItemNumber", type="string"),
 *                     @OA\Property(property="ExtendedWarrantyObj", type="object",
 *                         @OA\Property(property="PartDescription", type="string"),
 *                         @OA\Property(property="PartNumber", type="string"),
 *                         @OA\Property(property="ProductCode", type="string"),
 *                         @OA\Property(property="WarrantyEndDate", type="string")
 *                     ),
 *                     @OA\Property(property="ExternalOrderNumber", type="string"),
 *                     @OA\Property(property="HeaderNotes", type="string"),
 *                     @OA\Property(property="IncomingQTY", type="string"),
 *                     @OA\Property(property="IncomingUnitPartNumber", type="string"),
 *                     @OA\Property(property="IncomingUnitPartNumberDescription", type="string"),
 *                     @OA\Property(property="IncomingUnitSerialNumber", type="string"),
 *                     @OA\Property(property="InternalDepartmentNumber", type="string"),
 *                     @OA\Property(property="Looper", type="string"),
 *                     @OA\Property(property="MRACode", type="string"),
 *                     @OA\Property(property="Mkey", type="string"),
 *                     @OA\Property(property="MoreInfoNotes", type="string"),
 *                     @OA\Property(property="MsgId", type="string"),
 *                     @OA\Property(property="OutgoingQTY", type="string"),
 *                     @OA\Property(property="OutgoingUnitPartNumber", type="string"),
 *                     @OA\Property(property="OutgoingUnitPartNumberDescription", type="string"),
 *                     @OA\Property(property="PONumber", type="string"),
 *                     @OA\Property(property="PRCreationDate", type="string"),
 *                     @OA\Property(property="PRDetailNotes", type="string"),
 *                     @OA\Property(property="PRStatus", type="string"),
 *                     @OA\Property(property="PartRequestDetailNumber", type="string"),
 *                     @OA\Property(property="PartRequestHeaderID", type="string"),
 *                     @OA\Property(property="Priority", type="string"),
 *                     @OA\Property(property="ProblemFound", type="string"),
 *                     @OA\Property(property="ProductCode", type="string"),
 *                     @OA\Property(property="ProductCodeDescription", type="string"),
 *                     @OA\Property(property="ReRepairRule", type="string"),
 *                     @OA\Property(property="RepairNotes", type="string"),
 *                     @OA\Property(property="RepairStatus", type="string"),
 *                     @OA\Property(property="ReportedProblem", type="string"),
 *                     @OA\Property(property="RequestType", type="string"),
 *                     @OA\Property(property="ServiceCenter", type="string"),
 *                     @OA\Property(property="ServicePartsObj", type="object",
 *                         @OA\Property(property="ServiceEndDate", type="string"),
 *                         @OA\Property(property="ServicePartDescription", type="string"),
 *                         @OA\Property(property="ServicePartNumber", type="string"),
 *                         @OA\Property(property="ServiceProductCode", type="string")
 *                     ),
 *                     @OA\Property(property="ShipToAddress", type="object",
 *                         @OA\Property(property="Country", type="string"),
 *                         @OA\Property(property="Address3", type="string"),
 *                         @OA\Property(property="City", type="string"),
 *                         @OA\Property(property="Address2", type="string"),
 *                         @OA\Property(property="Address1", type="string"),
 *                         @OA\Property(property="Contact", type="string"),
 *                         @OA\Property(property="PostalCode", type="string"),
 *                         @OA\Property(property="SiteName", type="string"),
 *                         @OA\Property(property="SiteID", type="string"),
 *                         @OA\Property(property="State", type="string"),
 *                         @OA\Property(property="PhoneNo", type="string")
 *                     ),
 *                     @OA\Property(property="ShipToCow", type="string"),
 *                     @OA\Property(property="ShipVia", type="string"),
 *                     @OA\Property(property="Summary", type="string"),
 *                     @OA\Property(property="SupplyCow", type="string"),
 *                     @OA\Property(property="TID", type="string"),
 *                     @OA\Property(property="UnitWarrantyType", type="string"),
 *                     @OA\Property(property="PRAttributes", type="array",
 *                         @OA\Items(
 *                             @OA\Property(property="Name", type="string"),
 *                             @OA\Property(property="Value", type="string")
 *                         )
 *                     ),
 *                     @OA\Property(property="RPIDs", type="array",
 *                         @OA\Items(
 *                             @OA\Property(property="RPIDDescription", type="string"),
 *                             @OA\Property(property="RPIDID", type="string"),
 *                             @OA\Property(property="RPIDType", type="string"),
 *                             @OA\Property(property="RPIDWarrantyType", type="string")
 *                         )
 *                     )
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful response",
 *         @OA\JsonContent(
 *             @OA\Property(property="status", type="string"),
 *             @OA\Property(property="messageId", type="integer"),
 *             @OA\Property(property="message", type="string")
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized"
 *     )
 * )
 */

    public function prCancel(Request $request, $id)
    {
        try {
            $rma = RMA::findOrFail($id);
            $rma->delete();

            return response()->json([
                'status' => 'SUCCESS',
                'messageId' => $id,
                'message' => 'RMA canceled successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'ERROR',
                'message' => $e->getMessage(),
            ], HttpResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

 /**
 * @OA\Post(
 *     path="/api/acknowledge",
 *     summary="acknowledge",
 *     description="Acknowledge. Para utilizar este método se debe estar autenticado, lo cual se hace con el método login que se encuentra al inicio de esta documentación.",
 *     security={{"bearerAuth"=>{}}},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="AcknowledgeRequest",
 *                 type="object",
 *                 @OA\Property(
 *                     property="acknowledge",
 *                     type="object",
 *                     @OA\Property(property="MessageId", type="string"),
 *                     @OA\Property(property="MessageTime", type="string"),
 *                     @OA\Property(property="MessageType", type="string"),
 *                     @OA\Property(property="PartRequestDetailNumber", type="string"),
 *                     @OA\Property(property="PartRequestHeaderID", type="string"),
 *                     @OA\Property(property="Result", type="string"),
 *                     @OA\Property(property="ResultMessage", type="string"),
 *                     @OA\Property(
 *                         property="lines",
 *                         type="array",
 *                         @OA\Items(
 *                             type="object",
 *                             @OA\Property(property="message", type="string"),
 *                             @OA\Property(property="partNumber", type="string"),
 *                             @OA\Property(property="referenceNumber", type="string"),
 *                             @OA\Property(property="serialNumber", type="string"),
 *                             @OA\Property(property="status", type="string")
 *                         )
 *                     )
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful response",
 *         @OA\JsonContent(
 *             @OA\Property(property="status", type="string"),
 *             @OA\Property(property="messageId", type="string"),
 *             @OA\Property(property="message", type="string")
 *         )
 *     )
 * )
 */



    public function acknowledge(Request $request)
    {
        return response()->json([
            'status' => 'SUCCESS',
            'messageId' => 'Test',
            'message' => 'Test',
        ]);
    }

    private function handleRequestData(Request $request, $type)
    {
          // Definir una matriz de mapeo para los tipos de request
          $requestMapping = [
            'prCreate' => 'OrderCreateRequest.order',
            'prUpdate' => 'OrderUpdateRequest.order',
            // Otros tipos de request si es necesario
        ];

        // Verificar si el tipo existe en la matriz
        if (isset($requestMapping[$type])) {
            // Obtener los datos del request basado en el tipo
            return $request->input($requestMapping[$type]);
        }

        // Manejar el caso de un tipo no reconocido
        return [];
    }

    public function saveRequest( $request, $nameMetodo = null)
    {

          $usuario = auth()->user(); // Obtener el usuario autenticado

          if(is_object($usuario) && isset($usuario->name)){

            $order = $this->handleRequestData($request, $nameMetodo);
            $jsonResquest= json_encode($request->all());

          }else{

            $usuario = (object) array('name' => 'Tsa4');

            $order=[];
           // $jsonResquest= json_encode($request);
           $jsonResquest=json_encode($request);
           //$jsonResquest=null;

          }

          $userName = $usuario->name;

        // Crear una nueva instancia del modelo
        $requestVerifone = new RequestVerifoneTSAAPI();
        $requestVerifone->point = $nameMetodo;
        $requestVerifone->request =  $jsonResquest ?? '{"response": "No se pudo obtener el request"}';
        $requestVerifone->AspNetUsersId = $userName;   // Obtener el ID del usuario autenticado y guardarlo
        $requestVerifone->partrequestheaderid= $order['PartRequestHeaderID'] ?? '';
        $requestVerifone->partrequestdetailnumber= $order['PartRequestDetailNumber'] ?? '';
        //$requestVerifone->AspNetUsersId = auth()->id();   // Obtener el ID del usuario autenticado y guardarlo
        $requestVerifone->creation = now(); // Establecer la fecha de creación aquí
        $requestVerifone->save(); // Guardar el registro en la base de datos

          // Retornar el ID del registro creado
          return $requestVerifone->id;

    }

    private  function updateSaveRequest ($id, $response)
    {
        $requestVerifone = RequestVerifoneTSAAPI::findOrFail($id);

        $requestVerifone->response = json_encode($response);
        $requestVerifone->procesado=1;


        $requestVerifone->update(); // Guardar el registro en la base de datos

        return $requestVerifone->id;

    }

}



