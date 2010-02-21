<%@taglib uri="/struts-tags" prefix="s" %>
<%@page contentType="text/html" pageEncoding="MacRoman"%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=MacRoman">
        <title>Registro de fornecimento de webservices</title>
    </head>
    <body>
        <h1>Registro de webservices fake fornecidos</h1>
        <table cellspacing="5" border="0">
            <thead>
                <tr>
                    <th>
                        Data
                    </th>
                    <th>
                        Parametro A:
                    </th>
                    <th>
                        Parametro B:
                    </th>
                </tr>
            </thead>
            <tbody>
                <s:iterator value="registrosFornecimento" var="registroFornecimento">
                    <tr>
                        <td>
                            <s:date name="#registroFornecimento.horario" format="dd/MM/yyyy hh:mm:ss" />
                        </td>
                        <td align="right">
                            <s:property value="#registroFornecimento.parametroA"/>
                        </td>
                        <td align="right">
                            <s:property value="#registroFornecimento.parametroB"/>
                        </td>
                    </tr>
                </s:iterator>
            </tbody>
        </table>
    </body>
</html>
