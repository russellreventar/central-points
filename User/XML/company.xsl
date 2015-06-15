<?xml version="1.0" encoding="utf-8" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

  <xsl:template match="/">
    <html>

      <head>
        <meta http-equiv="Content-Language" content="en-us"/>
          <meta http-equiv="Content-Type" content="text/html; charset=windows-1252"/>
            <title></title>
          </head>

      <body>

        <xsl:for-each select="companies/company">
          <table border="0" width="100%" cellspacing="0" cellpadding="3" id="http://w3schools.com/php/php_mysql_intro.asptable1">
            <tr>
              <td colspan="2" bgcolor="#E3E3D5">
                <font face="Verdana" size="4" color="#4684C1">
                  <xsl:value-of select="companyInfo/companyName"/>:  
                </font>
              </td>
            </tr>
            <tr>
              <td width="20%">
                <xsl:element name="img">
                  <xsl:attribute name="src">
                    <xsl:value-of select="companyInfo/companyLogo"/>
                  </xsl:attribute>
                  <xsl:attribute name="width">225</xsl:attribute>
                  <xsl:attribute name="height">150</xsl:attribute>
                </xsl:element>
              </td>
              <td width="79%">
                <font size="5" face="Arial">
                  Points: <xsl:value-of select="companyInfo/points"/></font>
              </td>
            </tr>
			<tr>
              <td colspan="2" bgcolor="#E4E4E4">
                <font face="Arial" size="2" color="#000080">References</font>
                <xsl:for-each select="companyOptions/signup">
                  <li>
                    <xsl:value-of select="text()"/>
                  </li>
                </xsl:for-each>
              </td>
            </tr>
          </table>
		  <p />
        </xsl:for-each>

      </body>

    </html>


  </xsl:template>

</xsl:stylesheet>