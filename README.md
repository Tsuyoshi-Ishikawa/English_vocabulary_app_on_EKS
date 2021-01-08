# 説明
EKSに英単語アプリをデプロイする。<br>
PROCEDURE.mdに従って作業するとできる。

![alt text](./eks_structure.png "eks_structure")<br><br>

# 構造
- docker<br>
英単語アプリのdocker imageを定義するためのフォルダ。<br>
フロントをnuxt、バックエンドをlaravelとclean architectureで実装している。

- eks<br>
dockerフォルダで定義した英単語アプリをeksにデプロイするためのフォルダ。<br>
yamlファイルがあり、k8sのためのkubectlコマンドを使って、yamlに書いてある定義でデプロイできる

- PROCEDURE.md<br>
eksにデプロイするためにどのような順番で作業すれば良いかを記述している

