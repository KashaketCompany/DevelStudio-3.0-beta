object fmFormList: TfmFormList
  Left = 323
  Top = 171
  Width = 262
  Height = 295
  BorderIcons = [biSystemMenu]
  Caption = '{Form List}'
  Color = clBtnFace
  Constraints.MinHeight = 210
  Constraints.MinWidth = 262
  Font.Charset = DEFAULT_CHARSET
  Font.Color = clWindowText
  Font.Height = -11
  Font.Quality = fqClearTypeNatural
  Font.Name = 'Segoe UI'
  Font.Size = 8
  Font.Style = []
  OldCreateOrder = False
  DesignSize = (
    254
    260)
  PixelsPerInch = 96
  TextHeight = 13
  object form_name: TEdit
    Left = 8
    Top = 8
    Width = 237
    Height = 21
    Anchors = [akLeft, akTop, akRight]
    TabOrder = 0
  end
  object list: TListBox
    Left = 8
    Top = 32
    Width = 237
    Height = 189
    Anchors = [akLeft, akTop, akRight, akBottom]
    ItemHeight = 13
    TabOrder = 1
  end
  object BitBtn1: TBitBtn
    Left = 171
    Top = 228
    Width = 75
    Height = 25
    Anchors = [akRight, akBottom]
    Caption = '{ok}'
    ModalResult = 1
    TabOrder = 2
  end
  object BitBtn2: TBitBtn
    Left = 90
    Top = 228
    Width = 75
    Height = 25
    Anchors = [akRight, akBottom]
    Caption = '{cancel}'
    ModalResult = 1
    TabOrder = 3
  end
  object btn_add: TBitBtn
    Left = 8
    Top = 228
    Width = 25
    Height = 25
    Hint = '{Add new form}'
    Anchors = [akLeft, akBottom]
    TabOrder = 4
    Glyph.Data = {
      36030000424D3603000000000000360000002800000010000000100000000100
      18000000000000030000C40E0000C40E00000000000000000000FFFFFFFFFFFF
      FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFD9EEDD54B86730A94744B1
      59AFDDB8FFFFFFFFFFFFF7F7F7DDDDDDDFDFDFDFDFDFDFDFDFDFDFDFDFDFDFDF
      DFDFB5D1BA04962000961DFFFFFF00961D00961D83BF8EF5F5F5AF9D9DB29B9B
      AD9696AD9596AD9696AD9696AD9696AD96962B953B00961D00961DFFFFFF0096
      1D00961D079522A9A29BBAA3A3FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF
      FFFF069822FFFFFFFFFFFFFFFFFFFFFFFFFFFFFF00961D86977CB8A0A0FFFFFF
      FEFFFFFDFEFEFDFDFDFDFDFDFDFDFDFDFDFD21A33A00961D00961DFFFFFF0096
      1D00961D00961D929886B8A0A0FFFFFFFEFEFEFDFDFDFDFDFDFDFDFDFDFDFDFD
      FDFD89CE9600961D00961DFFFFFF00961D00961D48B45DAB9798B8A0A0FFFEFE
      FBFBFBFAFAFAFAFAFAFAFAFAFAFAFAFAFAFAF7F9F770C38000961D00961D0096
      1D3EAF54E7F3E8AB9797B69F9FFAFAFAFAFAFAFAFAFAFAFAFAFAFAFAFAFAFAFA
      FAFAFAFAFAFAFAFACAE7CF70C380CAE7CFFAFAFAFAFAFAAA9697B69D9DF9F5F5
      F2F2F2F1F1F1F1F1F1F1F1F1F1F1F1F1F1F1F1F1F1F1F1F1F7F7F7F1F1F1F1F1
      F1F2F3F3F8F4F4AA9696B69D9DF3F0F0EDEDEDECECECECECECECECECECECECEC
      ECECECECECECECECECECECECECECECECECEDEEEEF3EEEEAA9596B39A9AEFEBEC
      E9E9E9E8E8E8E8E8E8E8E8E8E8E8E8E8E8E8E8E8E8E8E8E8E8E8E8E8E8E8E8E8
      E8E9EAEAEFEAEAA99494B29799E4DEDEDEDCDCDEDBDBDEDBDBDEDBDBDEDBDBDE
      DBDBDEDBDCDEDCDCDEDCDCDEDCDCDEDCDCDFDEDEE6DEDEA89394AF8A8BCB9FA0
      C49A9BC49A9BC49A9BC49A9BC49A9BC49A9BC49A9BC49A9BC59A9BC69B9CC69B
      9CC69B9CCDA2A2A99696B39898EFD7D7E4CCCCE4CCCCE4CCCCE4CCCCE4CCCCE4
      CCCCE4CCCCE5CECEDABDBDCBA4A5CDA7A7CBA4A4E7C8C8AD9999C2A2A3C49697
      C29395C29395C29395C29395C29395C29395C29395C29395C09292BF8F8FBF8F
      8FBF8F91C29293C7ACACFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF
      FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF}
  end
  object btn_del: TBitBtn
    Left = 36
    Top = 228
    Width = 25
    Height = 25
    Hint = '{Delete selected forms}'
    Anchors = [akLeft, akBottom]
    TabOrder = 5
    Glyph.Data = {
      36050000424D3605000000000000360400002800000010000000100000000100
      0800000000000001000000000000000000000001000000010000FF00FF000000
      9A00012AF200002CF600002CF8000733F6000031FE000431FE000134FF000C3C
      FF00123BF100103BF400143EF400103DFB001743F6001B46F6001C47F6001D48
      F6001342FF001A47F8001847FF00174AFD001A48F9001D4BFF001A4CFF001D50
      FF00224DF100224CF400204BF800214CF800214EFC002550F4002D59F4002655
      FA002355FF002659FF002E5BF9002C5FFF00325DF1003B66F3003664FA00386B
      FF004071FA004274FF00497AFC00000000000000000000000000000000000000
      0000000000000000000000000000000000000000000000000000000000000000
      0000000000000000000000000000000000000000000000000000000000000000
      0000000000000000000000000000000000000000000000000000000000000000
      0000000000000000000000000000000000000000000000000000000000000000
      0000000000000000000000000000000000000000000000000000000000000000
      0000000000000000000000000000000000000000000000000000000000000000
      0000000000000000000000000000000000000000000000000000000000000000
      0000000000000000000000000000000000000000000000000000000000000000
      0000000000000000000000000000000000000000000000000000000000000000
      0000000000000000000000000000000000000000000000000000000000000000
      0000000000000000000000000000000000000000000000000000000000000000
      0000000000000000000000000000000000000000000000000000000000000000
      0000000000000000000000000000000000000000000000000000000000000000
      0000000000000000000000000000000000000000000000000000000000000000
      0000000000000000000000000000000000000000000000000000000000000000
      0000000000000000000000000000000000000000000000000000000000000000
      0000000000000000000000000000000000000000000000000000000000000000
      0000000000000000000000000000000000000000000000000000000000000000
      0000000000000000000000000000000000000000000000000000000000000000
      0000000000000000000000000000000000000000000000000000000000000000
      0000000000000000000000000000000000000000000000000000000000000000
      0000000000000000000000000000000000000000000000000000000000000000
      0000000000000000000000000000000000000000000000000000000000000000
      0000000000000000000000000000000000000000000000000000000000000000
      0000000000000000000000000000000000000000000000000000000000000000
      0000000000000000000000000000000000000000000000000000000000000000
      0000000000000000000000000000000000000000000000000000000000010100
      00000000000101000000000001150B010000000001040601000000000113180B
      010000010306030100000000000110180B010104060301000000000000000111
      190D060603010000000000000000000118120D05010000000000000000000001
      1D181312010000000000000000000124241D1D19110100000000000000012829
      2401011F191F010000000000012A2A26010000011F231D0100000000012C2701
      00000000011F1901000000000001010000000000000101000000000000000000
      0000000000000000000000000000000000000000000000000000}
  end
end
