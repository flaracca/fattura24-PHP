<?php
/*
** CREAZIONE DATI FATTURA IN XML
*/

$xmlstring = '<Fattura24>
  <Document>
    <DocumentType>I</DocumentType>
    <CustomerName>Mario Rossi</CustomerName>
    <CustomerAddress>Via Alberti 8</CustomerAddress>
    <CustomerPostcode>06122</CustomerPostcode>
    <CustomerCity>Perugia</CustomerCity>
    <CustomerProvince>PG</CustomerProvince>
    <CustomerCountry></CustomerCountry>
    <CustomerFiscalCode>MARROS66C44G217W</CustomerFiscalCode>
    <CustomerVatCode>03912377542</CustomerVatCode>
    <CustomerCellPhone>335123456789</CustomerCellPhone>
    <CustomerEmail>info@rossi.it</CustomerEmail>
    <DeliveryName>Mario Rossi</DeliveryName>
    <DeliveryAddress>Via Alberti 8</DeliveryAddress>
    <DeliveryPostcode>06122</DeliveryPostcode>
    <DeliveryCity>Perugia</DeliveryCity>
    <DeliveryProvince>PG</DeliveryProvince>
    <DeliveryCountry></DeliveryCountry>
    <Object>Oggetto del documento</Object>
    <TotalWithoutTax>900.00</TotalWithoutTax>
    <PaymentMethodName>Banca Popolare di.....</PaymentMethodName>
    <PaymentMethodDescription>IBAN: IT02L1234512345123456789012</PaymentMethodDescription>
    <VatAmount>198.00</VatAmount>
    <Total>1098.00</Total>
    <FootNotes>Vi ringraziamo per la preferenza accordataci</FootNotes>
    <SendEmail>true</SendEmail>
    <UpdateStorage>1</UpdateStorage>
    <F24OrderId>12345</F24OrderId>
    <IdTemplate>123</IdTemplate>
    <CustomField1></CustomField1>
    <CustomField2></CustomField2>
    <Payments>
      <Payment>
        <Date>2016-02-23</Date>
        <Amount>2135</Amount>
        <Paid>true</Paid>
      </Payment>
    </Payments>    
    <Rows>
      <Row>
        <Code>0001</Code>
        <Description>PULIZIA NUM. DUE FINESTRE A DUE ANTE E DUE MANI DI SMALTO ALL’ACQUA COMPRESI IMBOTTI E CASSETTONI AVVOLGIBILI</Description>
        <Qty>2</Qty>
        <Um></Um>
        <Price>200.00</Price>
        <Discounts></Discounts>
        <VatCode>22</VatCode>
        <VatDescription>IVA 22%</VatDescription>
      </Row>
      <Row>
        <Code>0002</Code>
        <Description>PULIZIA  NUM. DUE FINESTRONI A DUE ANTE E DUE MANI DI SMALTO ALL’ACQUA COMPRESI IMBOTTI E CASSETTONI AVVOLGIBILI</Description>
        <Qty>2</Qty>
        <Um></Um>
        <Price>250.00</Price>
        <Discounts></Discounts>
        <VatCode>22</VatCode>
        <VatDescription>IVA 22%</VatDescription>
      </Row>
    </Rows>
  </Document>
</Fattura24>';

$xw = xmlwriter_open_memory();
xmlwriter_start_document($xw, '1.0', 'UTF-8');
xmlwriter_text($xw, $xmlstring);
                                                               
$xml = xmlwriter_output_memory($xw);

/* INVIO DATI */
$xml_res = lasap_efattura('crea', $xml);
                                                               
/* LEGGO I DATI RICEVUTI DA FATTURA24 */
$xml = simplexml_load_string($xml_res);
                
$eres    = $xml->returnCode;
$des      = $xml->description;
$dID      = $xml->docId;
$dNR     = $xml->docNumber;
?>
